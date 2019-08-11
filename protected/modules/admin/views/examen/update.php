<?php
/* @var $this ExamenController */
/* @var $model Examen */

$this->breadcrumbs=array(
	'Examens'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);
?>
<h1>Actualizar Examen <?php echo $model->id; ?></h1>
<div class="container">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?></div>