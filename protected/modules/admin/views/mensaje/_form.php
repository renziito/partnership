<?php
/* @var $this MensajeController */
/* @var $model ExamenMensaje */
/* @var $form CActiveForm */
if ($model->isNewRecord) {
    $id               = Yii::app()->request->getQuery('id');
    $model->examen_id = $id;
}
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', [
        'id'                   => 'examen-mensaje-form',
        'enableAjaxValidation' => false,
    ]);
    ?>

    <p class="note">Los campos con un <span class="required">*</span> son requeridos.</p>

    <?= $form->errorSummary($model, '<b>Por favor verifique los siguientes errores : </b>'); ?>
    <?= $form->hiddenField($model, 'examen_id'); ?>

    <div class="row">
        <div class="col-md-5">
            <div class="form-group form-group-default required">
                <?= $form->labelEx($model, 'min'); ?>
                <?= $form->numberField($model, 'min', ['class' => 'form-control', 'step' => 'any']); ?>
            </div>
        </div>
        <div class="col-md-5">
            <div class="form-group form-group-default required">
                <?= $form->labelEx($model, 'max'); ?>
                <?= $form->numberField($model, 'max', ['class' => 'form-control', 'step' => 'any']); ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-10">
            <div class="form-group form-group-default required">
                <?= $form->labelEx($model, 'mensaje'); ?>
                <?= $form->textField($model, 'mensaje', ['class' => 'form-control']); ?>
            </div>
        </div>
    </div>

    <hr>
    <?= CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar', ['class' => 'btn btn-success']); ?>

    <?php $this->endWidget(); ?>

</div><!-- form -->