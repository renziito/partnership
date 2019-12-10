<?php

class PerfilController extends Controller {

    public function actionIndex() {
        $this->render('index');
    }
    
    public function actionHabilidad() {
        $this->render('habilidad');
    }

}
