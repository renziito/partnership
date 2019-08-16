<?php
/* @var $this DefaultController */

$this->breadcrumbs = array(
    $this->module->id => [Yii::app()->createUrl($this->module->id)],
    'Notas'
);
?>
<div class="container">
    <h1 class="m-b-50"><b>NOTAS</b></h1>
    <div class="row m-t-20">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr style="background-color: grey;">
                        <th style="color:white;font-size: 13px;">ID</th>
                        <th style="color:white;font-size: 13px;">Usuario</th>
                        <th style="color:white;font-size: 13px;">DNI</th>
                        <th style="color:white;font-size: 13px;">Examen</th>
                        <th style="color:white;font-size: 13px;">Nota</th>
                        <th style="color:white;font-size: 13px;">Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($examenes as $examen): ?>
                        <?php $usuario = Usuario::model()->findByPk($examen->usuario_id); ?>
                        <tr>
                            <td><?= $examen->examen_id ?></td>
                            <td><?= $usuario->nombres . ' ' . $usuario->apellidos ?></td>
                            <td><?= $usuario->dni ?></td>
                            <td><?= Examen::model()->findByPk($examen->examen_id)->titulo ?></td>
                            <td><?= $examen->nota ?></td>
                            <td><?= date('d-m-Y H:i', strtotime($examen->respuesta)) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>