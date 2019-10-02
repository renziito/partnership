<?php
/* @var $this ExamenController */
/* @var $model Examen */
/* @var $form CActiveForm */

$alternativas = [];

if (!$model->isNewRecord) {
    $preguntas = Pregunta::model()->findAll('estado = 1 AND examen_id = ' . $model->id);

    foreach ($preguntas as $pregunta) {
        $alter          = Respuesta::model()->find('estado = 1 AND pregunta_id =' . $pregunta->id);
        $alternativas[] = [
            'pregunta'    => $alter->id,
            'alternativa' => $alter->respuesta
        ];
    }
}
$model->tipo_calificacion = 1;
?>

<div class="form">

    <?php
    $form                     = $this->beginWidget('CActiveForm', [
        'id'                   => 'examen-form',
        'enableAjaxValidation' => false,
    ]);
    ?>

    <p class="note">Los campos con un <span class="required">*</span> son requeridos.</p>

    <?= $form->errorSummary($model, '<b>Por favor verifique los siguientes errores : </b>'); ?>
    <?=
        $form->hiddenField($model, 'tipo_calificacion');
    ?>
    <div class="row">
        <div class="col-xs-6">
            <div class="form-group form-group-default required">
                <?= $form->labelEx($model, 'titulo'); ?>
                <?=
                    $form->textField(
                        $model,
                        'titulo',
                        ['class' => 'form-control', 'required' => 'required']
                    );
                ?>
            </div>
        </div>
        <div class="col-xs-6">
            <div class="form-group form-group-default required">
                <?= $form->labelEx($model, 'tipo_id'); ?>
                <?php $tiposModel               = Tipo::model()->findAll('estado = 1') ?>
                <?php $tipos                    = CHtml::listData($tiposModel, 'id', 'tipo'); ?>
                <?=
                    $form->dropDownList($model, 'tipo_id', $tipos, [
                        'class' => 'form-control'
                    ]);
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
                <input class="form-control" step="any" id="cantidad" type="number" value="<?= ($model->isNewRecord ? '0' : count($alternativas)) ?>" required>
            </div>
        </div>
    </div>

    <hr>
    <?php if (count($alternativas) > 0) : ?>
        <h3>Preguntas</h3>
        <?php foreach ($alternativas as $k => $alternativa) : ?>
            <div class="col-xs-12">
                <div class="form-group form-group-default required">
                    <label for="<?= $alternativa['pregunta'] ?>" class="fade"><?= $k + 1 ?>.</label>
                    <input class="form-control" required="required" name="Alternativas[<?= $alternativa['pregunta'] ?>]" id="<?= $alternativa['pregunta'] ?>" type="number" value="<?= $alternativa['alternativa'] ?>">
                </div>
            </div>
        <?php endforeach; ?>
        <?= CHtml::submitButton('Guardar', ['class' => 'btn btn-success']); ?>
    <?php else : ?>
        <?= CHtml::button('Continuar', ['class' => 'btn btn-success', 'id' => 'btn-continue']); ?>
        <hr>
        <div id="preguntas">
        </div>
    <?php endif; ?>
    <?php $this->endWidget(); ?>

</div><!-- form -->

<script>
    $('#btn-continue').on('click', function() {
        var i = $('<i>').addClass('fa fa-question-circle pull-right cursor');
        var title = $('<h3>').html('Respuestas Correctas');
        var preguntas = $('<div>');
        var save = $('<input>').addClass('btn btn-success').attr('type', 'submit').attr('value', 'Guardar');
        var cantidad = $('#cantidad').val();

        i.on('click', function() {
            Sweetalert2.fire({
                title: '<strong>Indicaciones</strong>',
                type: 'info',
                html:
                    '<div class="text-left"><p><b>Recuerda insertar números:</b> </p>' +
                    '<p>' +
                    '- Si la respuesta es A, colocar 1<br>' +
                    '- Si la respuesta es B, colocar 2<br>' +
                    '- Si la respuesta es C, colocar 3<br>' +
                    '</p>' +
                    '<p>y así por cada alternativa</p>' +
                    '<p>Para moverte rápidamente hacia el siguiente campo,' +
                    'puedes presionar la tecla "Tab", la tecla "Enter" o ' +
                    'situarte con le mouse en el campo de texto que prefieras' +
                    '</p></div>',
                showCloseButton: true,
                focusConfirm: false
                })
        });

        title.append(i);
        preguntas.html(title);
        for (var i = 1; i <= cantidad; i++) {
            var div = $('<div>').addClass('form-group form-group-default required');
            var form = $('<div>').addClass('row');
            var label = $('<label>').attr('for', i).html(i + '.');
            var input = $('<input>').addClass('form-control').attr('required', 'required')
                .attr('id', i).attr('type', 'number').attr('name', 'Alternativas[' + i + ']');
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