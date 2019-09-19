<?php

class ExamenController extends Controller {

    /**
     * Creates a new model for simple examen.
     */
    public function actionCreateSimple() {
        $model = new Examen;
        $post  = Yii::app()->request->getPost('Examen', false);

        if ($post) {
            $model->attributes  = $post;
            $model->tipo_examen = 2;
            if ($model->save()) {
                $alternativas = Yii::app()->request->getPost('Alternativas', false);
                foreach ($alternativas as $k => $alternativa) {
                    $pregunta            = new Pregunta();
                    $pregunta->examen_id = $model->id;
                    $pregunta->pregunta  = $k;
                    $pregunta->save();
                    $alter               = new Respuesta();
                    $alter->pregunta_id  = $pregunta->id;
                    $alter->respuesta    = $alternativa;
                    $alter->puntaje      = $model->puntaje_positivo;
                    $alter->save();
                }

                $this->redirect(['index']);
            }
        }

        $this->render('createSimple', ['model' => $model]);
    }

    /**
     * Update a new model for simple examen.
     */
    public function actionUpdateSimple($id) {
        $model = $this->loadModel($id);
        $post  = Yii::app()->request->getPost('Examen', false);

        if ($post) {
            $model->attributes  = $post;
            $model->tipo_examen = 2;
            if ($model->save()) {

                $alternativas = Yii::app()->request->getPost('Alternativas', false);
                foreach ($alternativas as $k => $alternativa) {
                    $alter            = Respuesta::model()->findByPk($k);
                    $alter->respuesta = $alternativa;
                    $alter->save();
                }

                $this->redirect(['index']);
            }
        }
        $this->render('updateSimple', ['model' => $model]);
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'index' page.
     */
    public function actionCreate() {
        $model = new Examen;
        $post  = Yii::app()->request->getPost('Examen', false);

        if ($post) {
            $model->attributes = $post;
            if ($model->save()) {
                $this->redirect(['index']);
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
        $post  = Yii::app()->request->getPost('Examen', false);

        if ($post) {
            $model->attributes = $post;
            if ($model->save()) {
                $this->redirect(['index']);
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
            $this->redirect(['index']);
        }
    }

    /**
     * Manages all models.
     */
    public function actionIndex() {
        $model      = new Examen('search');
        $model->unsetAttributes();  // clear any default values
        $attributes = Yii::app()->request->getQuery('Examen', false);
        if ($attributes) {
            $model->attributes = $attributes;
        }
        $this->render('index', ['model' => $model]);
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Examen the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Examen::model()->findByPk($id);
        if ($model === null) {
            throw new CHttpException(404, 'La página solicitada no existe.');
        }
        return $model;
    }

}
