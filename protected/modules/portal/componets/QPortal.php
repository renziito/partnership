<?php

class QPortal {

    public static function getExamenByUser($id = false) {
        $sql = "SELECT * FROM examen WHERE estado = 1 and id = $id";
        
    }

}
