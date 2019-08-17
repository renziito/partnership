<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle   = Yii::app()->name . ' - Login';
$this->breadcrumbs = array(
    'Login',
);
?>

<div class="card card-default m-t-30">
    <div class="card-body">
        <div class="container">
            <img class="img-responsive m-auto" src="<?= Yii::app()->theme->getBaseUrl() ?>/assets/images/logo-partnership-normal.png"/>
        </div>
        <div class="container m-b-50 p-md-5">
            <p class="text-justify">
                Está a punto de ingresar a la interface para realizar las pruebas.
                Tenga en cuenta que las pruebas pueden tener una duración determinada. 
                Reserve un tiempo y lugar propicio para evitar interrupciones y 
                realizar la prueba de corrido.
            </p>

            <?php
            $form              = $this->beginWidget('CActiveForm', array(
                'id'                     => 'login-form',
                'enableClientValidation' => true,
                'clientOptions'          => array(
                    'validateOnSubmit' => true,
                ),
            ));
            ?>

            <div class="row clearfix m-t-40">
                <div class="col-md-6">
                    <div class="form-group form-group-default required" aria-required="true">
                        <?= $form->labelEx($model, 'username'); ?>
                        <?= $form->textField($model, 'username', ['class' => 'form-control', 'required' => 'required']); ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group form-group-default">
                        <?= $form->labelEx($model, 'password'); ?>
                        <?= $form->passwordField($model, 'password', ['class' => 'form-control', 'required' => 'required']); ?>
                    </div>
                </div>
            </div>

            <div class="row buttons pull-right">
                <?php echo CHtml::submitButton('Ingresar', ['class' => 'btn btn-danger btn-cons m-t-10']); ?>
            </div>

            <?php $this->endWidget(); ?>
        </div>
    </div>
</div>

<div class="form">

</div><!-- form -->
