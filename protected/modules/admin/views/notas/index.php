<?php
/* @var $this DefaultController */

$this->breadcrumbs = array(
    $this->module->id => [Yii::app()->createUrl($this->module->id)],
    'Notas'
);
?>
<script>
    function exportTableToExcel(tableID, filename = '') {
        var downloadLink;
        var dataType = 'application/vnd.ms-excel';
        var tableSelect = document.getElementById(tableID);
        var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');

        filename = filename ? filename + '.xls' : 'excel_data.xls';
        downloadLink = document.createElement("a");
        document.body.appendChild(downloadLink);

        if (navigator.msSaveOrOpenBlob) {
            var blob = new Blob(['\ufeff', tableHTML], {
                type: dataType
            });
            navigator.msSaveOrOpenBlob(blob, filename);
        } else {
            downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
            downloadLink.download = filename;
            downloadLink.click();
    }
    }
</script>
<div class="container">
    <h1 class="m-b-50">
        <b>NOTAS</b>
        <button  class="btn btn-primary pull-right" onclick="exportTableToExcel('notas', 'Notas_al_<?= date('d_m_Y') ?>')">Exportar a Excel</button>
    </h1>
    <div class="row m-t-20">
        <div class="col-md-12">
            <table class="table" id="notas">
                <thead>
                    <tr style="background-color: grey;">
                        <th style="color:black;font-size: 13px;">ID</th>
                        <th style="color:black;font-size: 13px;">Usuario</th>
                        <th style="color:black;font-size: 13px;">DNI</th>
                        <th style="color:black;font-size: 13px;">Examen</th>
                        <th style="color:black;font-size: 13px;">Nota</th>
                        <th style="color:black;font-size: 13px;">Resultado</th>
                        <th style="color:black;font-size: 13px;">Fecha</th>
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
                            <td><?= QUsuarios::getResultado($examen->examen_id, $examen->nota) ?></td>
                            <td><?= date('d-m-Y H:i', strtotime($examen->respuesta)) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>