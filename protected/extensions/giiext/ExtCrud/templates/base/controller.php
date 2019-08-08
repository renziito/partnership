<?php
/**
 * This is the template for generating a controller class file for CRUD feature.
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php echo "<?php\n"; ?>

class <?php echo $this->controllerClass; ?> extends <?php echo $this->baseControllerClass; ?>{

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'index' page.
	 */
	public function actionCreate(){
		$model=new <?php echo $this->modelClass; ?>;
        $post = Yii::app()->request->getPost('<?php echo $this->modelClass; ?>',false);

		if($post){
			$model->attributes=$post;
			if($model->save()){
				$this->redirect(['index']);
            }
		}

		$this->render('create',['model'=>$model]);
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'index' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id){
		$model=$this->loadModel($id);
        $post = Yii::app()->request->getPost('<?php echo $this->modelClass; ?>',false);

        if($post){
			$model->attributes=$post;
            if($model->save()){
				$this->redirect(['index']);
            }
		}

		$this->render('update',['model'=>$model]);
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id){
		$model = $this->loadModel($id);
        $model->estado = 0;

        if($model->save()){
            $this->redirect(['index']);
        }
	}

        /**
	 * Manages all models.
	 */
	public function actionIndex(){
		$model=new <?php echo $this->modelClass; ?>('search');
		$model->unsetAttributes();  // clear any default values
        $attributes = Yii::app()->request->getQuery('<?= $this->modelClass; ?>',false);
		if($attributes){
			$model->attributes=$attributes;
        }
		$this->render('index',['model'=>$model]);
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return <?php echo $this->modelClass; ?> the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id){
		$model=<?php echo $this->modelClass; ?>::model()->findByPk($id);
		if($model===null){
			throw new CHttpException(404,'La página solicitada no existe.');
        }
		return $model;
	}
}
