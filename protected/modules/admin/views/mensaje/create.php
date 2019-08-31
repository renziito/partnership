<?php
/* @var $this MensajeController */
/* @var $model ExamenMensaje */

$this->breadcrumbs = array(
    'Exámenes' => [Yii::app()->createUrl('admin/examen')],
    'Mensajes'
);
?>

<h1>Crear Mensaje al Terminar el exámen</h1>

<div class="container">
    <?php $this->renderPartial('_form', array('model' => $model)); ?>
</div>


