<?php
/* @var $this UsuarioController */
/* @var $model Usuario */

$this->breadcrumbs = array(
    'Usuarios' => array('index'),
    'Administrar',
);
?>

<h1>
    Administrador de Usuarios    
    <a class="pull-right btn btn-success" 
       href="<?= $this->createUrl("create") ?>">Nuevo
    </a>
</h1>

<div class="table-responsive">
    <?php
    $this->widget('zii.widgets.grid.CGridView', [
        'id'           => 'usuario-grid',
        'dataProvider' => $model->search(),
        'filter'       => $model,
        'columns'      => [
            'id',
            'nombres',
            'apellidos',
            'dni',
            'correo',
            [
                'class'              => 'CButtonColumn',
                'template'           => '{update}{delete}',
                'deleteConfirmation' => "js:'Se va a eliminar el evento : '+$(this).parent().parent().children(':nth-child(2)').text()+'?'",
            ],
        ],
    ]);
    ?>
</div>
