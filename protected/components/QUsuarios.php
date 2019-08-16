<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class QUsuarios {

    Const Key = "sup3rs3cr3tk3y";

    public static function getUnique() {
        Utils::show($_SERVER, true);
        return $_SERVER['HTTP_USER_AGENT'] . $_SERVER['LOCAL_ADDR'] . $_SERVER['LOCAL_PORT'] . $_SERVER['REMOTE_ADDR'];
    }

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

    public static function encryptIt($pure_string) {
        $dirty = array("+", "/", "=");
        $clean = array("_PLUS_", "_SLASH_", "_EQUAL_");

        $cookie         = new CHttpCookie('secret-key', date('YmdHis'));
        $cookie->expire = time() + 60 * 60 * 24 * 180;

        Yii::app()->request->cookies['secret-key'] = $cookie;

        $encrypted_string = mcrypt_encrypt(MCRYPT_BLOWFISH, $cookie, utf8_encode($pure_string), MCRYPT_MODE_ECB);
        $encrypted_string = base64_encode($encrypted_string);
        return str_replace($dirty, $clean, $encrypted_string);
    }

    public static function decryptIt($encrypted_string) {
        $dirty = array("+", "/", "=");
        $clean = array("_PLUS_", "_SLASH_", "_EQUAL_");

        $cookie = isset(Yii::app()->request->cookies['secret-key']) ? Yii::app()->request->cookies['secret-key']->value : false;
        if (!$cookie) {
            return false;
        }

        $string = base64_decode(str_replace($clean, $dirty, $encrypted_string));

        $decrypted_string = mcrypt_decrypt(MCRYPT_BLOWFISH, $cookie, $string, MCRYPT_MODE_ECB);
        return $decrypted_string;
    }

}
