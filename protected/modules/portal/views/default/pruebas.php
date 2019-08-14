<?php
/* @var $this DefaultController */

$this->breadcrumbs = array(
    $this->module->id,
);
?>
<div class="container text-center">
    <h1 class="m-b-50"><b>BIENVENIDO <?= strtoupper(Yii::app()->user->nombres) ?></b></h1>
    <div class="row m-t-20">
        <div class="col-md-12">
            <?php if (count($pruebas)): ?>
                <div class="text-left">
                <h4>
                    Estas son las pruebas asignadas, 
                    porfavor elige una para continuar
                </h4>
                    <?php foreach ($pruebas as $prueba): ?>
                        <?php $examen = Examen::model()->findByPk($prueba->examen_id) ?>
                        <div class="checkbox ">
                            <input type="checkbox" value="<?= $examen->id ?>" id="examen">
                            <label for="examen"><?= $examen->titulo ?></label>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <h4>Usted no tiene pruebas asociadas</h4>
            <?php endif; ?>
        </div>
    </div>
</div>