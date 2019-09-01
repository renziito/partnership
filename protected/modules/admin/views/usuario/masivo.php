<?php
$examen  = Examen::model()->findAll('estado = 1');
$lstData = CHtml::listData($examen, 'id', 'titulo');
?>
<div class="row">
    <div class="col-md-10">
        <h4>
            Creación de Usuarios Masivo y Asignación a exámen
            <a class="btn btn-danger pull-right" href="<?= $this->createUrl('index') ?>">
                Volver
            </a>
        </h4>
    </div>
</div>
<form enctype="multipart/form-data" method="POST">
    <div class="row">
        <div class="col-xs-12 col-md-10">
            <div class=" form-group form-group-default ">
                <label class="fade">Exámen</label>
                <?=
                CHtml::dropDownList('Masivo[id]', '', $lstData, [
                    'class'    => 'form-control', 'required' => 'required',
                    'empty'    => 'Seleccione el exámen'
                ])
                ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-md-10">
            <div class=" form-group form-group-default ">
                <label class="fade">Archivo</label>
                <input type="file" name="file"/>
            </div>
        </div>
    </div>
    <hr>
    <button type="submit" class="btn btn-success">Enviar</button>
</form>