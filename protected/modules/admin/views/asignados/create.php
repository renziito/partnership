<?php
/* @var $this AsignadosController */
/* @var $model UsuarioExamen */

$this->breadcrumbs = array(
    'Exámenes' => array('index'),
    'Asignar',
);
?>

<h1>Asignar Usuario a Exámen</h1>

<div class="container">
    <?php $this->renderPartial('_form', array('model' => $model)); ?>
</div>


