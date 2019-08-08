<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php echo "<?php\n"; ?>
/* @var $this <?php echo $this->getControllerClass(); ?> */
/* @var $model <?php echo $this->getModelClass(); ?> */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php echo "<?php \$form=\$this->beginWidget('CActiveForm', [
	'id'=>'" . $this->class2id($this->modelClass) . "-form',
	'enableAjaxValidation'=>false,
    ]); ?>\n"; ?>

    <p class="note">Los campos con un <span class="required">*</span> son requeridos.</p>

    <?php echo "<?= \$form->errorSummary(\$model,'<b>Por favor verifique los siguientes errores : </b>'); ?>\n"; ?>

    <?php
    foreach ($this->tableSchema->columns as $column) {
        if ($column->autoIncrement) {
            continue;
        } 
        ?>
        <div class="row">
            <div class="col-xs-9">
            <?= "<?= " . $this->generateActiveLabel($this->modelClass, $column) . "; ?>\n"; ?>
            <?= "<?= " . $this->generateActiveField($this->modelClass, $column) . "; ?>\n"; ?>
            </div>
        </div>

        <?php
    }
    ?>
    <hr>
    <?= "<?= CHtml::submitButton(\$model->isNewRecord ? 'Crear' : 'Guardar',['class'=>'btn btn-success']); ?>\n"; ?>

    <?= "<?php \$this->endWidget(); ?>\n"; ?>

</div><!-- form -->