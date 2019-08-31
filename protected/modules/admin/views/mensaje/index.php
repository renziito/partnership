<?php
/* @var $this MensajeController */
/* @var $model ExamenMensaje */

$this->breadcrumbs = array(
    'Examen' => [Yii::app()->createUrl('admin/examen')],
    'Mensajes'
);

$id               = Yii::app()->request->getQuery('id');
$model->examen_id = $id;
?>

<h1>
    Administrador de Examen Mensajes  
    <a class="pull-right btn btn-danger" href="<?= Yii::app()->createUrl('admin/examen') ?>">Volver</a>
    <a class="pull-right btn btn-success m-r-10" href="<?= $this->createUrl("create", ['id' => $id]) ?>">Nuevo</a>
</h1>

<div class="table-responsive">
    <?php
    $this->widget('zii.widgets.grid.CGridView', [
        'id'             => 'examen-mensaje-grid',
        'dataProvider'   => $model->search(),
        'filter'         => $model,
        'filterPosition' => '',
        'itemsCssClass'  => 'table',
        'columns'        => [
            'id',
            'min',
            'max',
            'mensaje',
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
                ],
            ]
        ],
    ]);
    ?>
</div>
