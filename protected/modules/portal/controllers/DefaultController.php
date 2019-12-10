<?php

class DefaultController extends Controller {

    public function actionIndex() {
        $this->render('index');
    }

    public function actionNotas($iden = false) {
        $id = Yii::app()->request->getQuery('iden', Yii::app()->user->id);
        $examenes = UsuarioExamen::model()->findAll('respuesta is not null AND estado = 1 AND usuario_id =' . $id);
        $this->render('notas', compact('examenes'));
    }

    public function actionPruebas() {
        $post = Yii::app()->request->getPost('Examen');
        $id = Yii::app()->user->id;
        if ($post) {
            $examen = $post['examen_id'];
            $token = QUsuarios::encryptIt($examen . '-' . $id);
            $route = $this->createUrl('prueba', ['t' => $token]);
            $this->redirect($route);
        }

        $where = "estado = 1 AND usuario_id = " . $id;
        $where .= " AND nota is null  AND respuesta is null";
        $where .= " AND hasta >= '" . date('Y-m-d') . "'";

        $pruebas = UsuarioExamen::model()->findAll($where);
        $this->render('pruebas', compact('pruebas'));
    }

    public function actionPrueba() {
        $token = Yii::app()->request->getQuery('t', false);
        if (!$token) {
            throw new Exception("Token inválido, NO PUEDE CONTINUAR");
        }
        $decypt = QUsuarios::decryptIt($token);

        if (!$decypt) {
            throw new Exception("Token incorrecto, NO PUEDE CONTINUAR");
        }

        list($examen_id, $id) = explode("-", $decypt);

        if (trim($id) != Yii::app()->user->id) {
            throw new Exception("Usuario incorrecto, NO PUEDE CONTINUAR");
        }

        $examen = Examen::model()->findbyPk($examen_id);
        $preguntas = Pregunta::model()->findAll('estado = 1 AND examen_id = ' . trim($examen_id));
        if ($examen->random) {
            shuffle($preguntas);
        }

        $this->render('prueba', compact('examen', 'preguntas'));
    }

    public function actionsavePrueba($examen) {
        unset(Yii::app()->request->cookies['secret-key']);

        $preguntas = Yii::app()->request->getPost('Prueba');
        $id = Yii::app()->user->id;
        $puntaje = 0;
        $total = Pregunta::model()->count('estado = 1 AND examen_id = ' . $examen);
        $promedio = [];
        foreach ($preguntas as $pregunta => $respuesta) {
            $model = new UsuarioRespuesta();
            $model->usuario_id = $id;
            $model->examen_id = $examen;
            $model->pregunta_id = $pregunta;
            $model->alternativa_id = $respuesta;

            $nota = Respuesta::model()->findByPk($respuesta)->puntaje;
            $puntaje += $nota;
            $model->save();

            $index = (string) $nota;

            if (isset($promedio[$index])) {
                $promedio[$index]++;
            } else {
                $promedio[$index] = 1;
            }
        }
        $update = UsuarioExamen::model()->find('estado = 1 AND examen_id = ' . $examen . ' AND usuario_id = ' . $id);
        $update->respuesta = date('Y-m-d H:i:s');
        $update->nota = $puntaje;
        $update->update();

        $validate = Examen::model()->findByPk($examen);
        $mensaje = "Tu Resultado fue : " . $update->nota;

        if ($validate->tipo_calificacion == 2) {
            $message = ExamenMensaje::model()->find(
                    'estado = true AND examen_id =' . $examen
                    . ' AND ' . $update->nota . ' BETWEEN min and max;'
            );
            if ($message) {
                $mensaje = $message->mensaje;
            }
        }

        if ($validate->tipo_calificacion == 3) {
            $maxs = array_keys($promedio, max($promedio));
            $message = ExamenPromedio::model()->find(
                    'estado = true AND examen_id =' . $examen
                    . ' and promedio = ' . $maxs[0] . ';'
            );
            if ($message) {
                $update->nota = $maxs[0];
                $update->update();
                $mensaje = $message->mensaje;
            }
        }

        $this->render('final', ['mensaje' => $mensaje]);
    }

}
