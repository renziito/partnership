<?php
/* @var $this PreguntaController */
/* @var $model Pregunta */
/* @var $form CActiveForm */
if ($model->isNewRecord) {
    $id               = Yii::app()->request->getQuery('id');
    $model->examen_id = $id;
}
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', [
        'id'                   => 'pregunta-form',
        'enableAjaxValidation' => false,
    ]);
    ?>

    <p class="note">Los campos con un <span class="required">*</span> son requeridos.</p>

    <?= $form->errorSummary($model, '<b>Por favor verifique los siguientes errores : </b>'); ?>

    <?= $form->hiddenField($model, 'examen_id'); ?>
    <div class="row">
        <div class="col-md-9 col-xs-12">
            <div class="form-group form-group-default required">
                <?= $form->labelEx($model, 'pregunta'); ?>
                <?= $form->textArea($model, 'pregunta', array('class' => 'summernote')); ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-9 col-xs-12">
            <div class="form-group form-group-default required">
                <?= $form->labelEx($model, 'random', ['label' => 'Alternativas en orden aleatorio']); ?>
                <?=
                $form->checkBox($model, 'random', [
                    'data-init-plugin' => 'switchery',
                    'data-size'        => 'small',
                    'data-color'       => "primary",
                    'data-switchery'   => "true"
                ]);
                ?>
            </div>
        </div>
    </div>

    <hr>
    <?= CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar', ['class' => 'btn btn-success']); ?>

    <?php $this->endWidget(); ?>

</div><!-- form -->