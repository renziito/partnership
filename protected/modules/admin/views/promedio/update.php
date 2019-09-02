<?php
/* @var $this PromedioController */
/* @var $model ExamenPromedio */

$this->breadcrumbs = array(
    'Examen'  => [Yii::app()->createUrl('admin/examen')],
    'Mensaje' => [Yii::app()->createUrl('admin/mensaje', ['id' => Yii::app()->request->getQuery('id')])],
    'Actualizar',
);
?>
<h1>Actualizar Mensaje al Terminar el exámen  <?php echo $model->id; ?></h1>
<div class="container">
    <?php $this->renderPartial('_form', array('model' => $model)); ?></div>