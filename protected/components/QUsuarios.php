<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class QUsuarios {

    public static function getAll($examen = false) {
        $where = "";
        if ($examen) {
            $where = " AND u.id NOT IN (
                        SELECT usuario_id FROM usuario_examen ue
                        WHERE ue.estado = 1 AND ue.examen_id = " . $examen . "
                     ) ";
        }

        $sql = "SELECT * FROM usuario u
                WHERE u.estado = 1" . $where;

        return Yii::app()->db->createCommand($sql)->queryAll();
    }

}
