<?php

class DefaultController extends Controller {

    public function actionIndex() {
        $route = Yii::app()->createUrl('admin/examen');
        $this->redirect($route);
    }

}
