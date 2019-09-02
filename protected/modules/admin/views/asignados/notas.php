<h2>Ingresar las respuestas:</h2>
<small>
    Recuerdar colocar 1 en lugar de A y 2 en lugar de B, y asi por cada alternativa.
    Luego de colocar el número puede presionar la tecla "Tab", la tecla "Enter" 
    o situarse con el mouse en el siguiente campo de texto. 
</small><br>
<?php
$id = Yii::app()->request->getQuery('id');

$form = $this->beginWidget('CActiveForm', [
    'id'                   => 'examen-form',
    'enableAjaxValidation' => false,
    'method'               => 'POST',
    'action'               => $this->createUrl('saveNotas', ['id' => $id])
        ]);
?>
<hr>
<?php for ($i = 1; $i <= count($preguntas); $i++): ?>
    <?= $i ?> . <input name="Alternativas[<?= $preguntas[$i - 1]->id ?>]" minlength="1" maxlength="1" required=""/>
    <br><br>
<?php endfor; ?>
<hr>
<button type="submit" class="btn btn-success">Terminar</button>
<?php $this->endWidget(); ?>
<script>
    $('body').on('keydown', 'input, select, textarea', function (e) {
        var self = $(this)
                , form = self.parents('form:eq(0)')
                , focusable
                , next
                ;
        if (e.keyCode == 13) {
            e.preventDefault();
            var $canfocus = $(':tabbable:visible')
            var index = $canfocus.index(document.activeElement) + 1;
            if (index >= $canfocus.length)
                index = 0;
            $canfocus.eq(index).focus();
        }
    });
</script>
