<?php
/* @var $this PromedioController */
/* @var $model ExamenPromedio */

$this->breadcrumbs = array(
    'Exámenes' => [Yii::app()->createUrl('admin/examen')],
    'Promedio'
);
?>

<h1>Crear Mensaje al Terminar el exámen</h1>

<div class="container">
    <?php $this->renderPartial('_form', array('model' => $model)); ?>
</div>


