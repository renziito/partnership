<?php
/* @var $this ExamenController */
/* @var $model Examen */
/* @var $form CActiveForm */

$preguntas = [];

if(!$model->isNewRecord){
    
}

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
                        ['class' => 'form-control', 'required' => 'required']);
                ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-8">
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
        <div class="col-xs-4">
            <div class="form-group form-group-default required">
                <?= $form->labelEx($model, 'tipo_calificacion'); ?>
                <?=
                $form->dropDownList($model, 'tipo_calificacion', [
                    1 => 'Nota', 'Puntaje', 'Promedio'
                        ], [
                    'class'    => 'form-control', 'required' => 'required'
                ])
                ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-4">
            <div class="form-group form-group-default required">
                <?= $form->labelEx($model, 'puntaje_positivo'); ?>
                <?= $form->numberField($model, 'puntaje_positivo', ['class' => 'form-control', 'step' => 'any']); ?>
            </div>
        </div>
        <div class="col-xs-4">
            <div class="form-group form-group-default required">
                <?= $form->labelEx($model, 'puntaje_negativo'); ?>
                <?= $form->numberField($model, 'puntaje_negativo', ['class' => 'form-control', 'step' => 'any']); ?>
            </div>
        </div>
        <div class="col-xs-4">
            <div class="form-group form-group-default required">
                <label for="cantidad">Cantidad de Preguntas</label>
                <input class="form-control" step="any"  id="cantidad" type="number" value="0" required>
            </div>
        </div>
    </div>

    <hr>
    <?= CHtml::button('Continuar', ['class' => 'btn btn-success', 'id' => 'btn-continue']); ?>

    <div id="preguntas">
    </div>
    <?php $this->endWidget(); ?>

</div><!-- form -->

<script>
    $('#btn-continue').on('click', function () {
        var preguntas = $('<div>');
        var save = $('<input>').addClass('btn btn-success').attr('type', 'submit').attr('value', 'Guardar');
        var cantidad = $('#cantidad').val();

        for (var i = 1; i <= cantidad; i++) {
            var div = $('<div>').addClass('form-group form-group-default required');
            var form = $('<div>').addClass('row');
            var label = $('<label>').attr('for', i).html(i + '.');
            var input = $('<input>').addClass('form-control').attr('required', 'required')
                    .attr('id', i).attr('step', 'any').attr('type', 'number');
            form.append(label);
            form.append(input);
            div.append(form);
            preguntas.append(div);
        }
        preguntas.append(save);

        $('#preguntas').html(preguntas);
        $('#btn-continue').remove();
    })
</script>