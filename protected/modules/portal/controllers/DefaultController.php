<?php

class DefaultController extends Controller {

    public function actionIndex() {
        $this->render('index');
    }

    public function actionNotas($iden = false) {
        $id       = Yii::app()->request->getQuery('iden', Yii::app()->user->id);
        $examenes = UsuarioExamen::model()->findAll('respuesta is not null AND estado = 1 AND usuario_id =' . $id);
        $this->render('notas', compact('examenes'));
    }

    public function actionPruebas() {
        $post = Yii::app()->request->getPost('Examen');
        $id   = Yii::app()->user->id;
        if ($post) {
            $examen = $post['examen_id'];
            $token  = QUsuarios::encryptIt($examen . '-' . $id);
            $route  = $this->createUrl('prueba', ['t' => $token]);
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

        $examen    = Examen::model()->findbyPk($examen_id);
        $preguntas = Pregunta::model()->findAll('estado = 1 AND examen_id = ' . trim($examen_id));
        if ($examen->random) {
            shuffle($preguntas);
        }

        $this->render('prueba', compact('examen', 'preguntas'));
    }

    public function actionsavePrueba($examen) {
        unset(Yii::app()->request->cookies['secret-key']);

        $preguntas = Yii::app()->request->getPost('Prueba');
        $id        = Yii::app()->user->id;
        $correctas = 0;
        $total     = Pregunta::model()->count('estado = 1 AND examen_id = ' . $examen);
        foreach ($preguntas as $pregunta => $respuesta) {
            $model                 = new UsuarioRespuesta();
            $model->usuario_id     = $id;
            $model->examen_id      = $examen;
            $model->pregunta_id    = $pregunta;
            $model->alternativa_id = $respuesta;

            $correct = Respuesta::model()->findByPk($respuesta)->correcta;
            if ($correct) {
                $correctas++;
            }
            $model->save();
        }
        $update            = UsuarioExamen::model()->find('estado = 1 AND examen_id = ' . $examen . ' AND usuario_id = ' . $id);
        $update->respuesta = date('Y-m-d H:i:s');
        $update->nota      = round(($correctas * 20) / $total, 2);
        $update->update();
        $this->render('final', ['nota' => $update->nota]);
    }

}
