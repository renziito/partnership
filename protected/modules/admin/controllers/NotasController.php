<?php

class NotasController extends Controller {

    public function actionIndex() {
        $examenes = UsuarioExamen::model()->findAll('respuesta is not null AND estado = 1');
        $this->render('index', compact('examenes'));
    }

}
