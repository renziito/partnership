<?php
/* @var $this TipoController */
/* @var $model Tipo */

$this->breadcrumbs = array(
    'Tipos'
);
?>

<h1>
    Administrador de Tipos    
    <a class="pull-right btn btn-success" href="<?= $this->createUrl("create") ?>">Nuevo</a>
</h1>

<div class="table-responsive">
    <?php
    $this->widget('zii.widgets.grid.CGridView', [
        'id'           => 'tipo-grid',
        'dataProvider' => $model->search(),
        'filter'       => $model,
        'itemsCssClass'  => 'table',
        'columns'      => [
            'id',
            'tipo',
            [
                'class'       => 'CButtonColumn',
                'template'    => '{actualiza}{eliminar}',
                'htmlOptions' => array('style' => 'width: 250px; text-align:center'),
                'buttons'     => [
                    'actualiza' => array(
                        'label'   => '<i class="fa fa-edit fa-2x" style="margin-right:20px"></i>',
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
