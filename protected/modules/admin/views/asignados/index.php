<?php
/* @var $this AsignadosController */
/* @var $model UsuarioExamen */

$this->breadcrumbs = array(
    'Usuario Examens' => array('index'),
    'Administrar',
);
?>

<h1>
    Administrador de Usuario Examens    <a class="pull-right btn btn-success" href="<?= $this->createUrl("create") ?>">Nuevo</a>
</h1>

<div class="table-responsive">
    <?php
    $this->widget('zii.widgets.grid.CGridView', [
        'id'           => 'usuario-examen-grid',
        'dataProvider' => $model->search(),
        'filter'       => $model,
        'columns'      => [
            'id',
            [
                'name'  => 'usuario_id',
                'value' => function($data) {
                    return Usuario::model()->findByPk($data->usuario_id)->nombres;
                }
            ],
            [
                'name'  => 'examen_id',
                'value' => function($data) {
                    return Examen::model()->findByPk($data->examen_id)->titulo;
                }
            ],
            'hasta',
            [
                'class'    => 'CButtonColumn',
                'template' => '{actualiza}{eliminar}',
                'buttons'  => [
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
