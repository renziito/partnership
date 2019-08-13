<?php

class PreguntaController extends Controller {

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'index' page.
     */
    public function actionCreate($id) {
        $model = new Pregunta;
        $post  = Yii::app()->request->getPost('Pregunta', false);

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
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'index' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        $post  = Yii::app()->request->getPost('Pregunta', false);

        if ($post) {
            $model->attributes = $post;
            if ($model->save()) {
                $route = $this->createUrl('index', ['id' => $id]);
                $this->redirect($route);
            }
        }

        $this->render('update', ['model' => $model]);
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
            $route = $this->createUrl('index', ['id' => $id]);
            $this->redirect($route);
        }
    }

    /**
     * Manages all models.
     */
    public function actionIndex() {
        $model      = new Pregunta('search');
        $model->unsetAttributes();  // clear any default values
        $attributes = Yii::app()->request->getQuery('Pregunta', false);
        if ($attributes) {
            $model->attributes = $attributes;
        }
        $this->render('index', ['model' => $model]);
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Pregunta the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Pregunta::model()->findByPk($id);
        if ($model === null) {
            throw new CHttpException(404, 'La página solicitada no existe.');
        }
        return $model;
    }

}
