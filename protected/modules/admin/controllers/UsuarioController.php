<?php

class UsuarioController extends Controller {

    public function actionMasivo() {
        $result = [];
        $post   = Yii::app()->request->getPost('Masivo');
        if ($post) {
            $file_path   = $_FILES['file']['tmp_name'];
            $sheet_array = Yii::app()->yexcel->readActiveSheet($file_path);
            for ($i = 2; $i <= count($sheet_array); $i++) {
                Utils::show($sheet_array[$i]);
            }
        }
        $this->render('masivo', compact('result'));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'index' page.
     */
    public function actionCreate() {
        $model = new Usuario;
        $post  = Yii::app()->request->getPost('Usuario', false);

        if ($post) {
            $model->attributes = $post;
            $model->username   = $model->dni;
            $model->password   = password_hash($model->dni, PASSWORD_DEFAULT);
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
        $post  = Yii::app()->request->getPost('Usuario', false);

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
        $model      = new Usuario('search');
        $model->unsetAttributes();  // clear any default values
        $attributes = Yii::app()->request->getQuery('Usuario', false);
        if ($attributes) {
            $model->attributes = $attributes;
        }
        $this->render('index', ['model' => $model]);
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Usuario the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Usuario::model()->findByPk($id);
        if ($model === null) {
            throw new CHttpException(404, 'La página solicitada no existe.');
        }
        return $model;
    }

}
