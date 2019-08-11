<?php
/* @var $this ExamenController */
/* @var $model Examen */

$this->breadcrumbs = array(
    'Exámenes' => array('index'),
    'Administrar',
);
?>

<h1>
    Administrador de Exámenes    
    <a class="pull-right btn btn-success" href="<?= $this->createUrl("create") ?>">Nuevo</a>
</h1>

<div class="table-responsive">
    <?php
    $this->widget('zii.widgets.grid.CGridView', [
        'id'           => 'examen-grid',
        'dataProvider' => $model->search(),
        'filter'       => $model,
        'columns'      => [
            'id',
            'titulo',
            [
                'name'   => 'tipo_id',
                'header' => 'Tipo',
                'value'  => function($data) {
                    return Tipo::model()->findbyPk($data->tipo_id)->tipo;
                }
            ],
            [
                'header' => 'Asignados',
                'value'  => function($data) {
                    $asignados = UsuarioExamen::model()->count(
                            'estado = 1 AND examen_id = ' . $data->id
                    );
                    return $asignados;
                }
            ],
            'timer',
            [
                'name'  => 'random',
                'value' => function($data) {
                    return ($data->random == 1 ? 'VERDADERO' : 'FALSO');
                }
            ],
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
