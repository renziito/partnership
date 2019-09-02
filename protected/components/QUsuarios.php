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

        $sql = "SELECT u.*, CONCAT(u.nombres,' ',u.apellidos) as nombre_completo, 
                CONCAT(u.nombres,' ',u.apellidos,' (',u.dni,')') as full_data FROM usuario u
                WHERE u.estado = 1" . $where;

        return Yii::app()->db->createCommand($sql)->queryAll();
    }

    public static function encrypt_old($pure_string) {
        $dirty = array("+", "/", "=");
        $clean = array("_PLUS_", "_SLASH_", "_EQUAL_");

        $cookie         = new CHttpCookie('secret-key', date('YmdHis') . Yii::app()->user->id);
        $cookie->expire = time() + 60 * 60 * 24 * 180;

        Yii::app()->request->cookies['secret-key'] = $cookie;

        $encrypted_string = mcrypt_encrypt(MCRYPT_BLOWFISH, $cookie, utf8_encode($pure_string), MCRYPT_MODE_ECB);
        $encrypted_string = base64_encode($encrypted_string);
        return str_replace($dirty, $clean, $encrypted_string);
    }

    public static function decrypt_old($encrypted_string) {
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

    public static function clean($string, $inverse = false) {
        $dirty = array("+", "/", "=");
        $clean = array("_PLUS_", "_SLASH_", "_EQUAL_");
        if ($inverse) {
            return str_replace($clean, $dirty, $string);
        }
        return str_replace($dirty, $clean, $string);
    }

    public static function encryptIt($plaintext) {
        $cipher      = "AES-128-CBC";
        $ivlen       = openssl_cipher_iv_length($cipher);
        $iv          = openssl_random_pseudo_bytes($ivlen);
        $key         = new CHttpCookie('secret-key', $iv);
        $key->expire = time() + 60 * 60 * 24 * 180;

        Yii::app()->request->cookies['secret-key'] = $key;

        $ciphertext_raw = openssl_encrypt($plaintext, $cipher, $key, OPENSSL_RAW_DATA, $iv);
        $hmac           = hash_hmac('sha256', $ciphertext_raw, $key, true);
        return self::clean(base64_encode($iv . $hmac . $ciphertext_raw));
    }

    public static function decryptIt($ciphertext) {
        $c      = base64_decode(self::clean($ciphertext, true));
        $cipher = "AES-128-CBC";
        $ivlen  = openssl_cipher_iv_length($cipher);
        $iv     = substr($c, 0, $ivlen);

        $key = isset(Yii::app()->request->cookies['secret-key']) ? Yii::app()->request->cookies['secret-key']->value : false;

        if (!$key) {
            return false;
        }

        $hmac           = substr($c, $ivlen, $sha2len        = 32);
        $ciphertext_raw = substr($c, $ivlen + $sha2len);
        return openssl_decrypt($ciphertext_raw, $cipher, $key, OPENSSL_RAW_DATA, $iv);
    }

    public static function getResultado($id, $puntaje) {
        $examen    = Examen::model()->findByPk($id);
        $resultado = $puntaje;
        if ($examen->tipo_calificacion == 2) {
            $message = ExamenMensaje::model()->find(
                    'estado = true AND examen_id =' . $id
                    . ' AND ' . $puntaje . ' BETWEEN min and max;'
            );
            if ($message) {
                $resultado = $message->mensaje;
            }
        }

        if ($examen->tipo_calificacion == 3) {
            $message = ExamenPromedio::model()->find(
                    'estado = true AND examen_id =' . $id
                    . ' and promedio = ' . $puntaje . ';'
            );
            if ($message) {
                $resultado = $message->mensaje;
            }
        }

        return $resultado;
    }

}
