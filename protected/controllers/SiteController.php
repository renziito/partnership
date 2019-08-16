<?php

class SiteController extends Controller {

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex() {
        $this->redirect('login');
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    /**
     * Displays the login page
     */
    public function actionLogin() {
        if (!Yii::app()->user->isGuest) {
            $route = 'portal';
            if (Yii::app()->user->rol == 'admin') {
                $route = 'admin';
            }
            $this->redirect($route);
        }

        $this->layout = '//layouts/login';
        $model        = new LoginForm;

        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login())
                $this->redirect(Yii::app()->user->returnUrl);
        }
        // display the login form
        $this->render('login', array('model' => $model));
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout() {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

    public function actionPerfil() {
        $id    = Yii::app()->request->getQuery('iden', Yii::app()->user->id);
        $user  = Usuario::model()->findbyPk($id);
        $post  = Yii::app()->request->getPost('Usuario', false);
        $error = false;
        if ($post) {
            if (password_verify($post['contrasena'], $user->password)) {
                $user->attributes = $post;
                if (isset($post['nclave']) && $post['nclave'] != "") {
                    if ($this->validateChange($post)) {
                        $user->password = password_hash($post['nclave'], PASSWORD_DEFAULT);
                    } else {
                        $error = "EN EL CAMBIO DE CONTRASEÑA";
                    }
                }
            } else {
                $error = "LA CONTRASEÑA NO ES CORRECTA";
            }
            if (!$error) {
                $user->update();
                $this->redirect($this->createUrl('perfil'));
            }
        }
        $this->render('perfil', compact('user', 'error'));
    }

}
