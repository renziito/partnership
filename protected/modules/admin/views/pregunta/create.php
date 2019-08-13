<?php
/* @var $this PreguntaController */
/* @var $model Pregunta */

$this->breadcrumbs = array(
    'Examen'    => [Yii::app()->createUrl('admin/examen')],
    'Preguntas' => [Yii::app()->createUrl('admin/pregunta', ['id' => Yii::app()->request->getQuery('id')])],
    'Crear',
);
?>

<h1>Crear Pregunta</h1>

<div class="container">
    <?php $this->renderPartial('_form', array('model' => $model)); ?>
</div>


