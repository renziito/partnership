<?php

class PerfilController extends Controller {

    public function actionIndex() {
        $this->render('index');
    }

    public function actionHabilidad() {
        $this->render('habilidad');
    }

    public function actionPensamiento() {
        $this->render('pensamiento');
    }

    public function actionsavePruebaPerfil($slug) {
        $post = Yii::app()->request->getPost('Habilidad');
        $result = [];

        foreach ($post as $key => $preguntas) {
            if (!isset($result[$key])) {
                $result[$key] = 0;
            }
            foreach ($preguntas as $n_pregunta => $value) {
                if ($value > 0) {
                    $correcta = UHabilidad::getAllforHabilidad($n_pregunta, $key, true);
                    $result[$key] += ($value == $correcta[0]['opcion']) ? 1 : -0.25;
                }
                Utils::show($key);
                //save value, n_pregunta, correcta[0]['opcion'],$key
            }
        }
        Utils::show($result);
    }

}
