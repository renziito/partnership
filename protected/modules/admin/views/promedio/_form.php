<?php
/* @var $this PromedioController */
/* @var $model ExamenPromedio */
/* @var $form CActiveForm */
if ($model->isNewRecord) {
    $id               = Yii::app()->request->getQuery('id');
    $model->examen_id = $id;
}
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', [
        'id'                   => 'examen-promedio-form',
        'enableAjaxValidation' => false,
    ]);
    ?>

    <p class="note">Los campos con un <span class="required">*</span> son requeridos.</p>

    <?= $form->errorSummary($model, '<b>Por favor verifique los siguientes errores : </b>'); ?>
    <?= $form->hiddenField($model, 'examen_id'); ?>

    <div class="row">
        <div class="col-md-3">
            <div class="form-group form-group-default required">
                <?= $form->labelEx($model, 'promedio'); ?>
                <?= $form->textField($model, 'promedio', ['class' => 'form-control']); ?>
            </div>
        </div>
        <div class="col-md-7">
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