<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity {

    private $_id;

    /**
     * Authenticates a user.
     * The example implementation makes sure if the username and password
     * are both 'demo'.
     * In practical applications, this should be changed to authenticate
     * against some persistent user identity storage (e.g. database).
     * @return boolean whether authentication succeeds.
     */
    public function authenticate() {
        Utils::setBusqueda([
            'username' => $this->username,
            'estado'   => 1
        ]);
        $model = Usuario::model()->find(Utils::getBusqueda());
        if (!($model)) {
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        } else {
            if (password_verify($this->password, $model->password)) {
                $this->_id       = $model->id;
                $this->setState("correo", $model->correo);
                $this->setState("rol", $model->rol);
                $this->setState("nombres", $model->nombres);
                $this->setState("apellidos", $model->apellidos);
                $this->errorCode = self::ERROR_NONE;
            } else {
                $this->errorCode = self::ERROR_PASSWORD_INVALID;
            }
        }
        return !$this->errorCode;
    }

    public function getId() {
        return $this->_id;
    }

}
