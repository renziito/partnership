<?php
/* @var $this DefaultController */

$this->breadcrumbs = array(
    $this->module->id,
);
?>
<div class="container text-center">
    <h1 class="m-b-50"><b>BIENVENIDO <?= strtoupper(Yii::app()->user->nombres) ?></b></h1>
    <small>¿Que necesitas hacer?</small>
    <div class="row m-t-20">
        <div class="col-md-6">
            <a href="<?= $this->createUrl('prueba') ?>" >
                <div class="btn-portal"
                     style="background: url(<?= Yii::app()->getBaseUrl(true) ?>/images/exam.jpg)">
                </div>
            </a>
        </div>
        <div class="col-md-6 btn-portal">
            <a href="<?= $this->createUrl('prueba') ?>" >
                <div class="btn-portal"
                     style="background: url(<?= Yii::app()->getBaseUrl(true) ?>/images/notas.jpg)">
                </div>
            </a>>
        </div>
    </div>
</div>