<?php
/* @var $this AlternativasController */
/* @var $model Respuesta */

$this->breadcrumbs = array(
    'Examen'       => [Yii::app()->createUrl('admin/examen')],
    'Preguntas'    => [Yii::app()->createUrl('admin/pregunta', ['id' => Yii::app()->request->getQuery('id')])],
    'Alternativas' => [Yii::app()->createUrl('admin/alternativas', ['id' => $model->id])],
    'Crear',
);
?>

<h1>Crear Alternativa</h1>

<div class="container">
    <?php $this->renderPartial('_form', array('model' => $model)); ?>
</div>


