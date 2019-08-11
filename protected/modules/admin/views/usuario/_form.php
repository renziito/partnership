<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form  = $this->beginWidget('CActiveForm', [
        'id'                   => 'usuario-form',
        'enableAjaxValidation' => false,
    ]);
    ?>

    <p class="note">Los campos con un <span class="required">*</span> son requeridos.</p>

    <?= $form->errorSummary($model, '<b>Por favor verifique los siguientes errores : </b>'); ?>


    <div class="row">
        <div class="col-md-6 col-xs-12">
            <div class="form-group form-group-default required">
                <?= $form->labelEx($model, 'nombres'); ?>
                <?= $form->textField($model, 'nombres', ['class' => 'form-control', 'size' => 60, 'maxlength' => 255]); ?>
            </div>
        </div>
        <div class="col-md-6 col-xs-12">
            <div class="form-group form-group-default required">
                <?= $form->labelEx($model, 'apellidos'); ?>
                <?= $form->textField($model, 'apellidos', ['class' => 'form-control', 'size' => 60, 'maxlength' => 255]); ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-xs-12">
            <div class="form-group form-group-default required">
                <?= $form->labelEx($model, 'dni'); ?>
                <?= $form->textField($model, 'dni', ['class' => 'form-control', 'size' => 60, 'maxlength' => 255]); ?>
            </div>
        </div>
        <div class="col-md-6 col-xs-12">
            <div class="form-group form-group-default required">
                <?= $form->labelEx($model, 'rol'); ?>
                <?php $roles = ['user' => 'Usuario', 'admin' => 'Administrador']; ?>  
                <?=
                $form->dropDownList($model, 'rol', $roles, [
                    'class' => 'form-control'
                ]);
                ?>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xs-12">
            <div class="form-group form-group-default required">
                <?= $form->labelEx($model, 'correo'); ?>
                <?=
                $form->textField($model, 'correo',
                        ['class' => 'form-control', 'size' => 60, 'maxlength' => 255]);
                ?>
            </div>
        </div>
    </div>

    <hr>
    <?= CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar', ['class' => 'btn btn-success']); ?>

    <?php $this->endWidget(); ?>

</div><!-- form -->