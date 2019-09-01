<?php
/* @var $this AsignadosController */
/* @var $model UsuarioExamen */
$id     = Yii::app()->request->getQuery('id');
$examen = Examen::model()->findByPk($id);

$model->examen_id = $id;

$this->breadcrumbs = array(
    'Exámenes' => [Yii::app()->createUrl('admin/examen')],
    'Asignar Exámenes',
);
?>

<h1>
    Usuarios asignados al <?= $examen->titulo ?>
    <a class="pull-right btn btn-danger" href="<?= Yii::app()->createUrl('admin/examen') ?>">Volver</a>
    <a class="pull-right btn btn-success m-r-10" href="<?= $this->createUrl("create", ['id' => $id]) ?>">Nuevo</a>
</h1>

<div class="table-responsive">
    <?php
    $this->widget('zii.widgets.grid.CGridView', [
        'id'            => 'usuario-examen-grid',
        'dataProvider'  => $model->search(),
        'filter'        => $model,
        'itemsCssClass' => 'table',
        'columns'       => [
            [
                'name'        => 'id',
                'htmlOptions' => array('style' => 'width: 50px;'),
            ],
            [
                'name'  => 'usuario_id',
                'value' => function($data) {
                    $user = Usuario::model()->findByPk($data->usuario_id);
                    return $user->nombres . ' ' . $user->apellidos;
                }
            ],
            [
                'name'   => 'nota',
                'header' => 'Puntaje'
            ],
            'hasta',
            [
                'class'       => 'CButtonColumn',
                'template'    => '{notas}{eliminar}',
                'htmlOptions' => array('style' => 'width: 150px; text-align:center'),
                'buttons'     => [
                    'notas'    => array(
                        'label'   => '<i class="fa fa-star fa-2x" style="margin-right:10px"></i>',
                        'url'     => 'Yii::app()->controller->createUrl("notas", array("id"=>$data->id))',
                        'options' => array('title' => 'Notas', 'data-toggle' => 'tooltip')
                    ),
                    'eliminar' => array(
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
