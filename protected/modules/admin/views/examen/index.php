<?php
/* @var $this ExamenController */
/* @var $model Examen */

$this->breadcrumbs = array(
    'Exámenes',
);
?>

<h1>
    Administrador de Exámenes    
    <a class="pull-right btn btn-success" href="<?= $this->createUrl("create") ?>">Nuevo</a>
</h1>

<div class="table-responsive">
    <?php
    $this->widget('zii.widgets.grid.CGridView', [
        'id'            => 'examen-grid',
        'dataProvider'  => $model->search(),
        'filter'        => $model,
        'itemsCssClass' => 'table',
        'columns'       => [
            [
                'name'        => 'id',
                'htmlOptions' => array('style' => 'width: 50px;'),
            ],
            'titulo',
            [
                'name'   => 'tipo_id',
                'header' => 'Tipo',
                'value'  => function($data) {
                    return Tipo::model()->findbyPk($data->tipo_id)->tipo;
                }
            ],
            [
                'header'      => 'Asignados',
                'htmlOptions' => array('style' => 'width: 50px;'),
                'value'       => function($data) {
                    $asignados = UsuarioExamen::model()->count(
                            'estado = 1 AND examen_id = ' . $data->id
                    );
                    return $asignados;
                }
            ],
            [
                'header'      => 'Preguntas',
                'htmlOptions' => array('style' => 'width: 50px;'),
                'value'       => function($data) {
                    $asignados = Pregunta::model()->count(
                            'estado = 1 AND examen_id = ' . $data->id
                    );
                    return $asignados;
                }
            ],
            [
                'header' => 'Puntaje Max <br> obtenible',
                'value'  => function($data) {
                    $preguntas = Pregunta::model()->findAll(
                            'estado = 1 AND examen_id = ' . $data->id
                    );
                    $total     = 0;
                    foreach ($preguntas as $pregunta) {
                        $where = "estado = 1 AND pregunta_id = " . $pregunta->id;
                        $alter = Respuesta::model()->findAll($where);
                        $sum   = array_reduce($alter, function($sum, $alter) {
                                    $sum += $alter->puntaje;
                                    return $sum;
                                }, '0');
                        $total += $sum;
                    }
                    echo $total;
                }
            ],
            [
                'name'        => 'timer',
                'htmlOptions' => array('style' => 'width: 50px;'),
            ],
            [
                'name'        => 'random',
                'htmlOptions' => array('style' => 'width: 50px;'),
                'value'       => function($data) {
                    return ($data->random == 1 ? 'VERDADERO' : 'FALSO');
                }
            ],
            [
                'class'       => 'CButtonColumn',
                'template'    => '{actualiza}{pregunta}{asignar}{mensajes}{promedio}{eliminar}',
                'htmlOptions' => array('style' => 'width: 200px; text-align:center'),
                'buttons'     => [
                    'actualiza' => array(
                        'label'   => '<i class="fa fa-edit fa-2x" style="margin-right:10px"></i>',
                        'url'     => 'Yii::app()->controller->createUrl("update", array("id"=>$data->id))',
                        'options' => array('title' => 'Actualizar', 'data-toggle' => 'tooltip'),
                    ),
                    'pregunta'  => array(
                        'label'   => '<i class="fa fa-question-circle fa-2x" style="margin-right:10px"></i>',
                        'url'     => 'Yii::app()->createUrl("/admin/pregunta", array("id"=>$data->id))',
                        'options' => array('title' => 'Preguntas', 'data-toggle' => 'tooltip'),
                    ),
                    'asignar'   => array(
                        'label'   => '<i class="fa fa-users fa-2x" style="margin-right:10px"></i>',
                        'url'     => 'Yii::app()->createUrl("/admin/asignados", array("id"=>$data->id))',
                        'options' => array('title' => 'Asignar', 'data-toggle' => 'tooltip'),
                    ),
                    'mensajes'  => array(
                        'label'   => '<i class="fa fa-comment fa-2x" style="margin-right:10px"></i>',
                        'url'     => 'Yii::app()->createUrl("/admin/mensaje", array("id"=>$data->id))',
                        'options' => array('title' => 'Mensajes x Puntaje', 'data-toggle' => 'tooltip'),
                        'visible' => '$data->tipo_calificacion == 2'
                    ),
                    'promedio'  => array(
                        'label'   => '<i class="fa fa-comment fa-2x" style="margin-right:10px"></i>',
                        'url'     => 'Yii::app()->createUrl("/admin/promedio", array("id"=>$data->id))',
                        'options' => array('title' => 'Mensajes x Promedio', 'data-toggle' => 'tooltip'),
                        'visible' => '$data->tipo_calificacion == 3'
                    ),
                    'eliminar'  => array(
                        'label'   => '<i class="fa fa-trash fa-2x" style="margin-right:10px; margin-top:10px"></i>',
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
