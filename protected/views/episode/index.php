<?php
$this->breadcrumbs=array(
	'Posts',
);

$this->menu=array(
	array('label'=>'Create Post', 'url'=>array('create')),
	array('label'=>'Manage Post', 'url'=>array('admin')),
);
/*?>

<h1>Posts</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); */ ?>

<?php if(!empty($_GET['tag'])): ?>
	<h1>Episodes Tagged with <i><?php echo CHtml::encode($_GET['tag']); ?></i></h1>
<?php else: ?>
	<h1>Episodes</h1>
<?php endif; ?>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'	=> $dataProvider,
	'itemView'		=> '_view',
	'template'		=> "{items}\n{pager}",
	'ajaxUpdate'	=> false,
)); ?>
<p></p>
