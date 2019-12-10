<?php
/* @var $this DefaultController */

$this->breadcrumbs = array(
    $this->module->id => [Yii::app()->createUrl($this->module->id)],
    'Perfil de Postulantes'
);
?>
<div class="container text-center">
    <h1 class="intro m-b-50"><b>BIENVENIDO <?= strtoupper(Yii::app()->user->nombres) ?></b></h1>
    <div class="intro row m-t-20">
        <div class="col-xs-12">
            <h2>Prueba del Perfil de Postulantes</h2>
            <div class="text-justify m-t-20">
                <b>Indicaciones Generales : </b><br>
                Esta prueba consta de  preguntas. Cada una de
                ellas tiene solo una respuesta correcta.Usted cuenta 
                con 10 minutos para resulverla.
            </div>
            <div class="m-t-40 text-center">
                <table class="table table-borderless">
                    <tr>
                        <td class="text-left">Habilidad numérica y comprensión lectora</td>
                        <td><a class="btn btn-success" href="<?= $this->createUrl('habilidad') ?>">Ir a la prueba</a></td>
                    </tr>
                    <tr>
                        <td class="text-left">Prueba Million</td>
                        <td><a class="btn btn-success" href="<?= $this->createUrl('million') ?>">Ir a la prueba</a></td>
                    </tr>
                    <tr>
                        <td class="text-left">Prueba Estilos de Pensamiento</td>
                        <td><a class="btn btn-success" href="<?= $this->createUrl('pensamiento') ?>">Ir a la prueba</a></td>
                    </tr>
                    <tr>
                        <td class="text-left">Prueba Estilos de Aprendizaje</td>
                        <td><a class="btn btn-success" href="<?= $this->createUrl('aprendizaje') ?>">Ir a la prueba</a></td>
                    </tr>
                    <tr>
                        <td class="text-left">Prueba Estilos de Comunicación</td>
                        <td><a class="btn btn-success" href="<?= $this->createUrl('comunicacion') ?>">Ir a la prueba</a></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>