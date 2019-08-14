<?php
/* @var $this PreguntaController */
/* @var $model Pregunta */

$this->breadcrumbs = array(
    'Examen' => [Yii::app()->createUrl('admin/examen')],
    'Preguntas'
);

$id               = Yii::app()->request->getQuery('id');
$model->examen_id = $id;
?>

<h1>
    Administrador de Preguntas    
    <a class="pull-right btn btn-danger" href="<?= Yii::app()->createUrl('admin/examen') ?>">Volver</a>
    <a class="pull-right btn btn-success m-r-10" href="<?= $this->createUrl("create", ['id' => $id]) ?>">Nuevo</a>
</h1>

<div class="table-responsive">
    <?php
    $this->widget('zii.widgets.grid.CGridView', [
        'id'           => 'pregunta-grid',
        'dataProvider' => $model->search(),
        'filter'       => $model,
        'columns'      => [
            'id',
            [
                'name'  => 'pregunta',
                'value' => function($data) {
                    echo $data->pregunta;
                }
            ],
            [
                'name'  => 'random',
                'value' => function($data) {
                    echo ($data->random) ? 'VERDADERO' : 'FALSO';
                }
            ],
            [
                'header' => 'Alternativas',
                'value'  => function($data) {
                    $where    = "estado = 1 AND pregunta_id = " . $data->id;
                    $total    = Respuesta::model()->count($where);
                    $where    .= " AND correcta = 1";
                    $correcta = Respuesta::model()->count($where);
                    if ($correcta == 0) {
                        $total = "<i class='fas fa-times fa-4x text-danger'></i>";
                    }

                    echo $total;
                }
            ],
            [
                'class'       => 'CButtonColumn',
                'template'    => '{actualiza}{alternativas}{eliminar}',
                'htmlOptions' => array('style' => 'width: 150px; text-align:center'),
                'buttons'     => [
                    'actualiza'    => array(
                        'label'   => '<i class="fa fa-edit fa-2x" style="margin-right:10px"></i>',
                        'url'     => 'Yii::app()->controller->createUrl("update", array("id"=>$data->id))',
                        'options' => array('title' => 'Actualizar', 'data-toggle' => 'tooltip'),
                    ),
                    'alternativas' => array(
                        'label'   => '<i class="fa fa-info-circle fa-2x" style="margin-right:10px"></i>',
                        'url'     => 'Yii::app()->createUrl("admin/alternativas", array("id"=>$data->id))',
                        'options' => array('title' => 'Alternativas', 'data-toggle' => 'tooltip'),
                    ),
                    'eliminar'     => array(
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
