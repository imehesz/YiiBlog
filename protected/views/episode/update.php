<?php
$this->breadcrumbs=array(
	'Posts'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Post', 'url'=>array('index')),
	array('label'=>'Create Post', 'url'=>array('create')),
	array('label'=>'View Post', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Post', 'url'=>array('admin')),
);
?>

<h1>update <i><?php echo $model->title; ?></i></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
