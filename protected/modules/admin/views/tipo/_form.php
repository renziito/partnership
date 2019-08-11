<?php
/* @var $this TipoController */
/* @var $model Tipo */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', [
        'id'                   => 'tipo-form',
        'enableAjaxValidation' => false,
    ]);
    ?>

    <p class="note">Los campos con un <span class="required">*</span> son requeridos.</p>

    <?= $form->errorSummary($model, '<b>Por favor verifique los siguientes errores : </b>'); ?>

    
    <div class="row">
        <div class="col-xs-12">
            <div class="form-group form-group-default required">
                <?= $form->labelEx($model, 'tipo'); ?>
                <?=
                $form->textField($model, 'tipo',
                        ['class' => 'form-control']);
                ?>
            </div>
        </div>
    </div>

    <hr>
    <?= CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar', ['class' => 'btn btn-success']); ?>

    <?php $this->endWidget(); ?>

</div><!-- form -->