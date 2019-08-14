<?php
/* @var $this AlternativasController */
/* @var $model Respuesta */
/* @var $form CActiveForm */
if ($model->isNewRecord) {
    $id                 = Yii::app()->request->getQuery('id');
    $model->pregunta_id = $id;
}
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', [
        'id'                   => 'respuesta-form',
        'enableAjaxValidation' => false,
    ]);
    ?>

    <p class="note">Los campos con un <span class="required">*</span> son requeridos.</p>

    <?= $form->errorSummary($model, '<b>Por favor verifique los siguientes errores : </b>'); ?>

    <div class="row">
        <div class="col-xs-6">
            <div class="form-group form-group-default required">
                <?= $form->hiddenField($model, 'pregunta_id'); ?>
                <?= $form->labelEx($model, 'respuesta'); ?>
                <?=
                $form->textField($model, 'respuesta', array('class' => 'form-control'));
                ?>
            </div>
        </div>
        <div class="col-xs-3">
            <div class="form-group form-group-default required">
                <?= $form->labelEx($model, 'correcta'); ?>
                <?=
                $form->checkBox($model, 'correcta', array(
                    'data-init-plugin' => 'switchery',
                    'data-size'        => 'small',
                    'data-size'        => 'success',
                    'data-switchery'   => "true"
                ));
                ?>
            </div>
        </div>
    </div>
    <small>
        Si selecciona que esta es la correcta, las demás alternativas 
        se marcarán como "incorrectas".
    </small>


    <hr>
    <?= CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar', ['class' => 'btn btn-success']); ?>

    <?php $this->endWidget(); ?>

</div><!-- form -->