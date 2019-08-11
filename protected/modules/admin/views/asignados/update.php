<?php
/* @var $this AsignadosController */
/* @var $model UsuarioExamen */

$this->breadcrumbs=array(
	'Usuario Examens'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);
?>
<h1>Actualizar UsuarioExamen <?php echo $model->id; ?></h1>
<div class="container">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?></div>