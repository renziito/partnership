<?php
/* @var $this DefaultController */

$this->breadcrumbs = array(
    $this->module->id => [Yii::app()->createUrl($this->module->id)],
    'Selección de Exámen'
);
?>
<div class="container text-center">
    <h1 class="m-b-50"><b>BIENVENIDO <?= strtoupper(Yii::app()->user->nombres) ?></b></h1>
    <div class="row m-t-20">
        <div class="col-md-12">
            <?php if (count($pruebas)): ?>
                <div class="text-left">
                    <h4>
                        Estas son las pruebas asignadas, por favor elige una para continuar
                    </h4>
                    <?php
                    $form = $this->beginWidget('CActiveForm', [
                        'id'                   => 'examen-form',
                        'enableAjaxValidation' => false,
                        'method'               => 'POST'
                    ]);
                    ?>
                    <?php foreach ($pruebas as $prueba): ?>
                        <?php $examen = Examen::model()->findByPk($prueba->examen_id) ?>
                        <div class="radio">
                            <input type="radio" name="Examen[examen_id]" value="<?= $examen->id ?>" id="examen_<?= $examen->id ?>">
                            <label for="examen_<?= $examen->id ?>"><?= $examen->titulo ?></label>
                        </div>
                    <?php endforeach; ?>
                    <div class="m-t-40 text-center">
                        <button type="submit" class="btn btn-success"> Continuar</button>
                    </div>
                    <?php $this->endWidget(); ?>
                </div>
            <?php else: ?>
                <h4>Usted no tiene pruebas asignadas</h4>
            <?php endif; ?>
        </div>
    </div>
</div>