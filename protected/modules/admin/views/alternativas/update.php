<?php
/* @var $this AlternativasController */
/* @var $model Respuesta */

$pregunta = Pregunta::model()->findByPk($model->pregunta_id);
$examen   = Examen::model()->findByPk($pregunta->examen_id);

$this->breadcrumbs = array(
    'Examen'       => [Yii::app()->createUrl('admin/examen')],
    'Preguntas'    => [Yii::app()->createUrl('admin/pregunta', ['id' => $examen->id])],
    'Alternativas' => [Yii::app()->createUrl('admin/alternativas', ['id' => $pregunta->id])],
    'Actualizar',
);
?>
<h1>Actualizar Respuesta <?php echo $model->id; ?></h1>
<div class="container">
    <?php $this->renderPartial('_form', array('model' => $model)); ?>
</div>