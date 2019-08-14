<?php
/* @var $this AlternativasController */
/* @var $model Respuesta */

$this->breadcrumbs = array(
    'Exámen'    => [Yii::app()->createUrl('admin/examen')],
    'Preguntas' => [Yii::app()->createUrl('admin/examen')],
    'Alternativas',
);

$id                 = Yii::app()->request->getQuery('id');
$model->pregunta_id = $id;

$pregunta = Pregunta::model()->findByPk($id);
?>

<h1>
    Administrador de Alternativas    
    <a class="pull-right btn btn-danger" href="<?= Yii::app()->createUrl('admin/pregunta/index', ['id' => $pregunta->examen_id]) ?>">Volver</a>
    <a class="pull-right btn btn-success m-r-10" href="<?= $this->createUrl("create", ['id' => $id]) ?>">Nuevo</a>
</h1>

<div class="table-responsive">
    <?php
    $this->widget('zii.widgets.grid.CGridView', [
        'id'           => 'respuesta-grid',
        'dataProvider' => $model->search(),
        'filter'       => $model,
        'columns'      => [
            'id',
            [
                'name'   => 'respuesta',
                'header' => 'Alternativa'
            ],
            [
                'name'  => 'correcta',
                'value' => function($data) {
                    return ($data->correcta ? "CORRECTA" : "DISTRACTOR");
                }
            ],
            [
                'class'       => 'CButtonColumn',
                'template'    => '{actualiza}{eliminar}',
                'htmlOptions' => array('style' => 'width: 150px; text-align:center'),
                'buttons'     => [
                    'actualiza' => array(
                        'label'   => '<i class="fa fa-edit fa-2x" style="margin-right:10px"></i>',
                        'url'     => 'Yii::app()->controller->createUrl("update", array("id"=>$data->id))',
                        'options' => array('title' => 'Actualizar', 'data-toggle' => 'tooltip'),
                    ),
                    'eliminar'  => array(
                        'label'   => '<i class="fa fa-trash fa-2x" style="margin-right:10px"></i>',
                        'url'     => 'Yii::app()->controller->createUrl("delete", array("id"=>$data->id))',
                        'options' => array('title' => 'Eliminar', 'data-toggle' => 'tooltip'),
                        'click'   => 'function(){ var conf = confirm("Eliminar?"); if(conf==false)return false;}',
                    ),
                ]
            ],
        ],
    ]);
    ?>
</div>
