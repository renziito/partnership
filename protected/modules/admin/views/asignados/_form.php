<?php
/* @var $this AsignadosController */
/* @var $model UsuarioExamen */
/* @var $form CActiveForm */
$id = Yii::app()->request->getQuery('id');

$usuarioModel = QUsuarios::getAll($id);
?>
<div class="pull-right">
    <a href="<?= $this->createUrl('index', ['id' => $id]) ?>" 
       class="btn btn-danger">Volver</a>
</div>

<div class="form m-t-40">

    <?php
    $form         = $this->beginWidget('CActiveForm', [
        'id'                   => 'usuario-examen-form',
        'enableAjaxValidation' => false,
    ]);
    ?>

    <p class="note">Los campos con un <span class="required">*</span> son requeridos.</p>

    <?= $form->errorSummary($model, '<b>Por favor verifique los siguientes errores : </b>'); ?>

    <div class="row">
        <div class="col-md-9 col-xs-12">
            <div class="form-group form-group-default required">
                <?= $form->labelEx($model, 'usuario_id'); ?>
                <?php $user         = Chtml::listData($usuarioModel, 'id', 'full_data') ?>
                <?=
                $form->dropDownList($model, 'usuario_id', $user, [
                    'class' => 'select2'
                ])
                ?>
            </div>
        </div>
        <div class="col-md-3 col-xs-12">
            <div class="form-group form-group-default required">
                <?= $form->labelEx($model, 'hasta'); ?>
                <?= $form->dateField($model, 'hasta', ['class' => 'form-control', 'required' => 'required']); ?>
            </div>
        </div>
    </div>

    <hr>
    <?= CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar', ['class' => 'btn btn-success']); ?>

    <?php $this->endWidget(); ?>

</div><!-- form -->