<?php
/* @var $this ExamenController */
/* @var $model Examen */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form       = $this->beginWidget('CActiveForm', [
        'id'                   => 'examen-form',
        'enableAjaxValidation' => false,
    ]);
    ?>

    <p class="note">Los campos con un <span class="required">*</span> son requeridos.</p>

    <?= $form->errorSummary($model, '<b>Por favor verifique los siguientes errores : </b>'); ?>

    <div class="row">
        <div class="col-xs-12">
            <div class="form-group form-group-default required">
                <?= $form->labelEx($model, 'titulo'); ?>
                <?=
                $form->textField($model, 'titulo',
                        ['class' => 'form-control']);
                ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="form-group form-group-default required">
                <?= $form->labelEx($model, 'tipo_id'); ?>
                <?php $tiposModel = Tipo::model()->findAll('estado = 1') ?>
                <?php $tipos      = CHtml::listData($tiposModel, 'id', 'tipo'); ?>
                <?=
                $form->dropDownList($model, 'tipo_id', $tipos, [
                    'class' => 'form-control'
                ]);
                ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-xs-12">
            <div class="form-group form-group-default required">
                <?= $form->labelEx($model, 'timer'); ?>
                <?= $form->numberField($model, 'timer', ['class' => 'form-control', 'step' => 'any']); ?>
            </div>
        </div>
        <div class="col-md-6 col-xs-12">
            <div class="form-group form-group-default required">
                <?= $form->labelEx($model, 'random', ['label' => 'Preguntas en orden aleatorio']); ?>
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