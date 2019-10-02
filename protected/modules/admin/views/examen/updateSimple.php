<?php
/* @var $this ExamenController */
/* @var $model Examen */

$this->breadcrumbs = array(
    'Exámenes' => [Yii::app()->createUrl('admin/examen')],
    'Actualizar'
);
?>
<h1>Actualizar <?php echo $model->titulo; ?></h1>
<div class="container">
    <?php $this->renderPartial('_form_1', array('model' => $model)); ?>
</div>


