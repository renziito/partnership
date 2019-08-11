<?php
/* @var $this TipoController */
/* @var $model Tipo */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('CActiveForm', [
	'id'=>'tipo-form',
	'enableAjaxValidation'=>false,
    ]); ?>

    <p class="note">Los campos con un <span class="required">*</span> son requeridos.</p>

    <?= $form->errorSummary($model,'<b>Por favor verifique los siguientes errores : </b>'); ?>

            <div class="row">
            <div class="col-xs-9">
            <?= $form->labelEx($model,'tipo'); ?>
            <?= $form->textField($model,'tipo',['class'=>'form-control','size'=>60,'maxlength'=>255]); ?>
            </div>
        </div>

                <div class="row">
            <div class="col-xs-9">
            <?= $form->labelEx($model,'fecha'); ?>
            <?= $form->textField($model,'fecha'); ?>
            </div>
        </div>

                <div class="row">
            <div class="col-xs-9">
            <?= $form->labelEx($model,'estado'); ?>
            <?= $form->textField($model,'estado'); ?>
            </div>
        </div>

            <hr>
    <?= CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar',['class'=>'btn btn-success']); ?>

    <?php $this->endWidget(); ?>

</div><!-- form -->