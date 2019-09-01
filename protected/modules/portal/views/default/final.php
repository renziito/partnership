<?php
/* @var $this DefaultController */

$this->breadcrumbs = array(
    $this->module->id => [Yii::app()->createUrl($this->module->id)],
    'Exámen'
);
?>
<script>
    $(document).ready(function () {
        Swal.fire({
            type: 'success',
            title: 'Tu Prueba Finalizo',
            text: '<?= $mensaje ?>',
            allowOutsideClick: false,
            confirmButtonText: 'Ir a inicio'
        }).then((result) => {
            window.location.replace("<?= $this->createUrl('pruebas') ?>");
        });
    });
</script>