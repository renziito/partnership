<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php echo "<?php\n"; ?>
/* @var $this <?php echo $this->getControllerClass(); ?> */
/* @var $model <?php echo $this->getModelClass(); ?> */

<?php
$label=$this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	'$label'=>array('index'),
	'Administrar',
);\n";
?>

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#<?= $this->class2id($this->modelClass); ?>-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>
    Administrador de <?= $this->pluralize($this->class2name($this->modelClass)); ?>
    <a class="pull-right btn btn-success" href="<?='<?= $this->createUrl("create")?>'?>">Nuevo</a>
</h1>

<?= "<?php echo CHtml::link('Busqueda Avanzada','#',['class'=>'search-button']); ?>"; ?>

<div class="search-form" style="display:none">
<?= "<?php \$this->renderPartial('_search',[
	'model'=>\$model,
]); ?>\n"; ?>
</div><!-- search-form -->

<div class="table-responsive">
<?= "<?php"; ?> $this->widget('zii.widgets.grid.CGridView', [
	'id'=>'<?= $this->class2id($this->modelClass); ?>-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>[
<?php
$count=0;
foreach($this->tableSchema->columns as $column)
{
	if(++$count==7)
		echo "\t\t/*\n";
	echo "\t\t'".$column->name."',\n";
}
if($count>=7)
	echo "\t\t*/\n";
?>
		[
			'class'=>'CButtonColumn',
                        'template'           => '{update}{delete}',
                        'deleteConfirmation' => "js:'Se va a eliminar el evento : '+$(this).parent().parent().children(':nth-child(2)').text()+'?'",
		],
	],
]); ?>
</div>
