<?php
/* @var $this TipoController */
/* @var $model Tipo */

$this->breadcrumbs = array(
    'Tipos' => [Yii::app()->createUrl('admin/tipo')],
    'Actualizar'
);
?>
<h1>Actualizar Tipo <?php echo $model->id; ?></h1>
<div class="container">
    <?php $this->renderPartial('_form', array('model' => $model)); ?>
</div>