<?php
/* @var $this DefaultController */

$this->breadcrumbs = array(
    $this->module->id => [Yii::app()->createUrl($this->module->id)],
    'Exámen'
);
?>
<div class="container text-center">
    <h1 class="intro m-b-50"><b>BIENVENIDO <?= strtoupper(Yii::app()->user->nombres) ?></b></h1>
    <div class="intro row m-t-20">
        <div class="col-xs-12">
            <h2><?= $examen->titulo ?></h2>
            <div class="text-justify m-t-20">
                <b>Indicaciones Generales : </b><br>
                Esta prueba consta de <?= count($preguntas) ?> preguntas. Cada una de
                ellas tiene solo una respuesta correcta.<?= ($examen->timer) ? ' Usted cuenta 
                con ' . $examen->timer . ' minutos para resulverla.' : '' ?>
            </div>
            <div class="m-t-40 text-center">
                <button type="button" id="btn-continue" class="btn btn-danger">CONTINUAR</button>
            </div>
        </div>
    </div>
    <div class="row preguntas hidden">
        <div class="col-xs-10">
            <?php
            $form              = $this->beginWidget('CActiveForm', [
                'id'                   => 'examen-form',
                'enableAjaxValidation' => false,
                'method'               => 'POST',
                'action'               => $this->createUrl('savePrueba', ['examen' => $examen->id])
            ]);
            ?>
            <?php foreach ($preguntas as $key => $pregunta): ?>
                <div class="card card-transparent text-justify">
                    <div class="card-body no-padding">
                        <div id="card-circular-minimal" class="card card-default">
                            <div class="card-header">
                                <div class="card-title badge-title">Pregunta <?= $key + 1 ?></div>
                            </div>
                            <div class="card-body">
                                <h3><?= $pregunta->pregunta ?></h3>
                                <?php
                                $alternativas = Respuesta::model()->findAll('estado = 1 AND pregunta_id = ' . $pregunta->id);
                                if ($pregunta->random) {
                                    shuffle($alternativas);
                                }
                                ?>
                                <p>
                                    <?php foreach ($alternativas as $alternativa): ?>
                                    <div class="radio">
                                        <input type="radio" name="Prueba[<?= $pregunta->id ?>]" value="<?= $alternativa->id ?>" id="respuesta_<?= $alternativa->id ?>">
                                        <label for="respuesta_<?= $alternativa->id ?>"><?= $alternativa->respuesta ?></label>
                                    </div>
                                <?php endforeach ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <br>
            <button type="submit" class="btn btn-success">Terminar</button>
            <?php $this->endWidget(); ?>
        </div>
        <?php if ($examen->timer): ?>
            <div class="col-xs-2">
                <div style="position:fixed">
                    <div class="countdown"></div><br/>
                    <progress id="progressbar" value="<?= $examen->timer * 60 ?>" max="<?= $examen->timer * 60 ?>"></progress>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
<script>
    $('#btn-continue').on('click', function () {
        $('.preguntas').removeClass('hidden');
        $('.intro').addClass('hidden');

        if (<?= $examen->timer ?> > 0) {
            var i = <?= $examen->timer * 60 ?>;

            var counterBack = setInterval(function () {
                i--;
                if (i > 0) {
                    $('#progressbar').val(i);
                } else {
                    clearInterval(counterBack);
                    Swal.fire({
                        type: 'error',
                        title: 'El tiempo termino',
                        text: 'Lo siento, el tiempo a terminado',
                        allowOutsideClick: false
                    }).then((result) => {
                        $('#examen-form').submit();
                    })
                }

            }, 1000);

            var timer2 = "<?= $examen->timer ?>:00";
            var interval = setInterval(function () {
                var timer = timer2.split(':');
                var minutes = parseInt(timer[0], 10);
                var seconds = parseInt(timer[1], 10);
                --seconds;
                minutes = (seconds < 0) ? --minutes : minutes;
                if (minutes < 0) {
                    clearInterval(interval);
                    $('.countdown').html('00:00');
                } else {
                    seconds = (seconds < 0) ? 59 : seconds;
                    seconds = (seconds < 10) ? '0' + seconds : seconds;
                    $('.countdown').html(minutes + ':' + seconds);
                    timer2 = minutes + ':' + seconds;
                }
            }, 1000);
        }

    });
</script>