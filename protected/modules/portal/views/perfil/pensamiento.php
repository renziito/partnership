<?php
/* @var $this DefaultController */

$this->breadcrumbs = array(
    $this->module->id => [Yii::app()->createUrl($this->module->id)],
    'Perfil de Postulantes' => [Yii::app()->createUrl('perfil')],
    'Habilidad Numérica y Comprensión Lectora'
);
?>
<div class="container text-center">
    <h1 class="intro m-b-50"><b>BIENVENIDO <?= strtoupper(Yii::app()->user->nombres) ?></b></h1>
    <div class="intro row m-t-20">
        <div class="col-xs-12">
            <h2>Prueba Estilos de Pensamiento</h2>
            <div class="text-justify m-t-20">
                <b>
                    Esta sección contiene una serie de preguntas que se refieren a tu estilo
                    o tipo de pensamiento; es decir, a la forma de enfrentar la vida o a las 
                    necesidades que se presentan.
                    Por cada situación encontrarás 4 alternativas. Elige la que más va
                    de acuerdo a tu forma de ser y pon 5 puntos en el recuadro que corresponde.<br>
                    También, puedes elegir dos alternativas que van con tu forma de ser y
                    distribuir los 5 puntos entre las dos, poniéndole a una 4 puntos y a la otra 1.
                    Esto quiere decir que a la que se le asigne 4 puntos te describe mejor que la otra.<br>
                    Finalmente, puedes elegir dos alternativas que van con tu forma de ser y distribuir los 5 
                    puntos entre las dos, sólo que en este caso podrías colocar a una 3 puntos 
                    y a la otra 2 puntos. Esto quiere decir que a la que se le asigne 3 puntos 
                    te describe mejor. <br>
                    Estás a punto de iniciar el test. Recuerda que una vez que 
                    inicies, no podrás retroceder o actualizar la página web, 
                    en caso decidas hacerlo el test pasará automáticamente al estado: 
                    Inconcluso y no podrás volver a resolverlo.<br><br>
                    Recuerde:
                    <ul>
                        <ol>Puede elegir máximo dos alternativas.</ol>
                        <ol>No hay respuestas correctas o incorrectas. Trata de responder en la forma más auténtica posible.</ol>
                        <ol>
                            Si se equivoca o quiere cambiar alguna respuesta, puede retroceder a la pregunta y marcar el otro espacio.
                        </ol>
                        <ol>
                            No hay un tiempo límite para esta sección. De igual modo, el tiempo promedio 
                            que le toma a una persona contestar es de 20 minutos. Se ha estimado el tiempo 
                            suficiente para que sea contestado dentro de los parámetros esperados.
                        </ol>
                        <ol>5 puntos si solo una opción la caracteriza.</ol>
                        <ol>
                            4 puntos y 1 punto en caso dos opciones la caracterice,
                            siendo la opción marcada con 4 puntos la que más lo caracteriza.
                        </ol>
                        <ol>
                            3 puntos y 2 puntos en caso dos opciones la caracterice, 
                            siendo la opción marcada con 3 puntos la que más lo caracteriza.
                        </ol>
                    </ul>
                </b>
            </div>
            <div class="m-t-40 text-center">
                <button type="button" id="btn-continue" class="btn btn-danger">CONTINUAR</button>
            </div>
        </div>
    </div>
    <div class="row preguntas hidden">
        <div class="col-xs-10">
            <?php
            $form = $this->beginWidget('CActiveForm', [
                'id' => 'examen-form',
                'enableAjaxValidation' => false,
                'method' => 'POST',
                'action' => $this->createUrl('savePruebaPerfil', ['slug' => 'habilidad'])
            ]);
            $k = 1;
            ?>

            <?php foreach (UHabilidad::getAllPensamientosAlternativas() as $preg => $alters): ?>
                <div class="card card-transparent text-justify">
                    <div class="card-body no-padding">
                        <div id="card-circular-minimal" class="card card-default">
                            <div class="card-header">
                                <div class="card-title badge-title">Pregunta <?= $k ?></div>
                            </div>
                            <div class="card-body">
                                <h5><?= $preg ?></h5>
                                <p>
                                    <?php foreach ($alters as $alter): ?>
                                    <div class="row">
                                        <div class="col-xs-1">
                                            <input type="number" min="0" max="5" 
                                                   class="form-control val_<?= $k ?> validate" 
                                                   data-class="val_<?= $k ?>">
                                        </div>
                                        <div><?= $alter ?></div>
                                    </div> 
                                <?php endforeach; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $k++; ?>
            <?php endforeach; ?>
            <br>
            <button type="submit" class="btn btn-success btn-end">Terminar</button>
            <?php $this->endWidget(); ?>
        </div>
    </div>
</div>
<script>
    $('#btn-continue').on('click', function () {
        $('.preguntas').removeClass('hidden');
        $('.intro').addClass('hidden');
    });

    $('.validate').on('keyup', function (elem, i) {
        var clase = $(this).data('class');
        console.log(clase);
        var sum = 0;
        var n = 0;
        $('.' + clase).each(function (i, elem) {
            if (elem.value) {
                n++;
                sum += parseInt(elem.value);
                console.log(elem.value);
                console.log(sum);
                if (sum > 5 || n > 2) {
                    elem.value = "";
                }

            }
        });
    });

</script>