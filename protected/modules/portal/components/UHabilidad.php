<?php

class UHabilidad {

    public static function getAllforHabilidad($pregunta) {
        $sql = "SELECT * FROM db_partnership.ex_habilidad ex 
                LEFT JOIN db_partnership.ex_habilidad_alternativa alt ON 
                alt.id_habilidad = ex.id AND alt.estado = TRUE
                WHERE ex.n_pregunta = " . $pregunta . " AND ex.estado = TRUE";

        return Yii::app()->db->createCommand($sql)->queryAll();
    }

}
