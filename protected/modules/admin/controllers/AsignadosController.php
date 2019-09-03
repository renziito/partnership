<?php

class AsignadosController extends Controller {

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'index' page.
     */
    public function actionCreate($id) {
        $model = new UsuarioExamen;
        $post  = Yii::app()->request->getPost('UsuarioExamen', false);

        if ($post) {
            $model->attributes = $post;
            $model->examen_id  = $id;
            if ($model->save()) {
                $route = $this->createUrl('index', ['id' => $id]);
                $this->redirect($route);
            }
        }

        $this->render('create', ['model' => $model]);
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $model         = $this->loadModel($id);
        $model->estado = 0;

        if ($model->save()) {
            UsuarioRespuesta::model()->updateAll(['estado' => 0], 'estado = 1 AND examen_id = ' . $model->examen_id);

            $route = $this->createUrl('index', ['id' => $model->examen_id]);
            $this->redirect($route);
            $this->redirect(['index']);
        }
    }

    /**
     * Manages all models.
     */
    public function actionIndex() {
        $model      = new UsuarioExamen('search');
        $model->unsetAttributes();  // clear any default values
        $attributes = Yii::app()->request->getQuery('UsuarioExamen', false);
        if ($attributes) {
            $model->attributes = $attributes;
        }
        $this->render('index', ['model' => $model]);
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return UsuarioExamen the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = UsuarioExamen::model()->findByPk($id);
        if ($model === null) {
            throw new CHttpException(404, 'La página solicitada no existe.');
        }
        return $model;
    }

    public function actionNotas($id) {
        $model     = $this->loadModel($id);
        $preguntas = Pregunta::model()->findAll(
                'estado = 1 AND examen_id = ' . $model->examen_id);

        $this->render('notas', compact('preguntas'));
    }

    public function actionsaveNotas($id) {
        $model     = $this->loadModel($id);
        $preguntas = Yii::app()->request->getPost('Alternativas');
        $puntaje   = 0;
        $promedio  = [];

        foreach ($preguntas as $pregunta => $alternativa) {
            $sql = "SELECT * FROM (SELECT (@row_number:=@row_number + 1)
            AS num, r.* FROM `respuesta` r, (SELECT @row_number:=0) AS t
             where pregunta_id = ".$pregunta.") as foo where num =".$alternativa;

            $result = Yii::app()->db->createCommand($sql)->queryRow();


            $respuesta                 = new UsuarioRespuesta();
            $respuesta->usuario_id     = $model->usuario_id;
            $respuesta->examen_id      = $model->examen_id;
            $respuesta->pregunta_id    = $pregunta;
            $respuesta->alternativa_id = $result['id'];
            $respuesta->save();

            $nota    = $result['puntaje'];
            $puntaje += $nota;

            $index = (string) $nota;

            if (isset($promedio[$index])) {
                $promedio[$index] ++;
            } else {
                $promedio[$index] = 1;
            }
        }

        $model->respuesta = date('Y-m-d H:i:s');
        $model->nota      = $puntaje;
        $model->update();

        $validate = Examen::model()->findByPk($model->examen_id);

        if ($validate->tipo_calificacion == 3) {
            $maxs        = array_keys($promedio, max($promedio));
            $model->nota = $maxs[0];
            $model->update();
        }

        $route = $this->createUrl('index', ['id' => $model->examen_id]);
        $this->redirect($route);
    }

}
