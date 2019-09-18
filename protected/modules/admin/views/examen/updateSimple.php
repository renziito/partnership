<?php
/* @var $this ExamenController */
/* @var $model Examen */

$this->breadcrumbs = array(
    'Exámenes' => [Yii::app()->createUrl('admin/examen')],
    'Actualizar'
);
?>
<h1>Actualizar Exámen <?php echo $model->id; ?></h1>
<div class="container">
    <?php $this->renderPartial('_form_1', array('model' => $model)); ?>
</div>


