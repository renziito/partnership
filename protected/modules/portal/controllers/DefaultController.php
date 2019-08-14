<?php

class DefaultController extends Controller {

    public function actionIndex() {
        $this->render('index');
    }

    public function actionPruebas() {
        $where   = "estado = 1 AND usuario_id = " . Yii::app()->user->id;
        $where.= " AND hasta > ".date('Y-m-d');
        $pruebas = UsuarioExamen::model()->findAll($where);
        $this->render('pruebas', compact('pruebas'));
    }

}
