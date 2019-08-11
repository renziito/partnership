<?php
/* @var $this ExamenController */
/* @var $model Examen */

$this->breadcrumbs = array(
    'Examenes' => array('index'),
    'Crear',
);
?>

<h1>Crear Exámen</h1>

<div class="container">
    <?php $this->renderPartial('_form', array('model' => $model)); ?>
</div>


