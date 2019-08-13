<?php
/* @var $this UsuarioController */
/* @var $model Usuario */

$this->breadcrumbs = array(
    'Usuarios' => [Yii::app()->createUrl('admin/usuario')],
    'Crear',
);
?>

<h1>Crear Usuario</h1>

<div class="container">
    <?php $this->renderPartial('_form', array('model' => $model)); ?></div>


