<?php
/* @var $this AsignadosController */
/* @var $model UsuarioExamen */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form         = $this->beginWidget('CActiveForm', [
        'id'                   => 'usuario-examen-form',
        'enableAjaxValidation' => false,
    ]);
    ?>

    <p class="note">Los campos con un <span class="required">*</span> son requeridos.</p>

    <?= $form->errorSummary($model, '<b>Por favor verifique los siguientes errores : </b>'); ?>

    <div class="row">
        <div class="col-xs-12">
            <div class="form-group form-group-default required">
                <?= $form->labelEx($model, 'usuario_id'); ?>
                <?php $usuarioModel = Usuario::model()->findAll('estado = 1'); ?>
                <?php $user         = Chtml::listData($usuarioModel, 'id', 'nombres') ?>
                <?=
                $form->dropDownList($model, 'usuario_id', $user, [
                    'class' => 'select2'
                ])
                ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="form-group form-group-default required">
                <?= $form->labelEx($model, 'examen_id'); ?>
                <?php $examenModel  = Examen::model()->findAll('estado = 1'); ?>
                <?php $examen       = Chtml::listData($examenModel, 'id', 'titulo') ?>
                <?=
                $form->dropDownList($model, 'examen_id', $examen, [
                    'class' => 'select2'
                ])
                ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-9">
            <?= $form->labelEx($model, 'hasta'); ?>
            <?= $form->dateField($model, 'hasta', ['class' => 'form-control']); ?>
        </div>
    </div>

    <hr>
    <?= CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar', ['class' => 'btn btn-success']); ?>

    <?php $this->endWidget(); ?>

</div><!-- form -->