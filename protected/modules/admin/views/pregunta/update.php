<?php
/* @var $this PreguntaController */
/* @var $model Pregunta */

$this->breadcrumbs = array(
    'Examen'    => [Yii::app()->createUrl('admin/examen')],
    'Preguntas' => [Yii::app()->createUrl('admin/pregunta', ['id' => Yii::app()->request->getQuery('id')])],
    'Actualizar',
);
?>
<h1>Actualizar Pregunta <?php echo $model->id; ?></h1>
<div class="container">
    <?php $this->renderPartial('_form', array('model' => $model)); ?>
</div>