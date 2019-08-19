<?php
/* @var $this DefaultController */

$this->breadcrumbs = array(
    $this->module->id,
);
?>
<div class="container text-center">
    <h1 class="m-b-50"><b>BIENVENIDO <?= strtoupper(Yii::app()->user->nombres) ?></b></h1>
    <h6>¿Que necesitas hacer?</h6>
    <div class="row m-t-20">
        <div class="col-md-6">
            <a href="<?= $this->createUrl('pruebas') ?>" >
                <div class="btn-portal"
                     style="background: url(<?= Yii::app()->getBaseUrl(true) ?>/images/exam.jpg)">
                    <h3>RENDIR EXÁMEN</h3>
                </div>
            </a>
        </div>
        <div class="col-md-6">
            <a href="<?= $this->createUrl('notas') ?>" >
                <div class="btn-portal"
                     style="background: url(<?= Yii::app()->getBaseUrl(true) ?>/images/notas.jpg)">
                    <h3>REVISAR NOTAS</h3>
                </div>
            </a>
        </div>
    </div>
</div>