<ul>
	<li><?php echo CHtml::link('Create New Post',array('post/create')); ?></li>
	<li><?php echo CHtml::link('Manage Posts',array('post/admin')); ?></li>
	<?php if( Yii::app()->controller->id == 'post' && Yii::app()->controller->action->id == 'view' ) : ?>
		<li><?php //echo CHtml::link('Update post',array('post/update', array( 'id' => $model->id ) )) . ' (' . Comment::model()->pendingCommentCount . ')'; ?></li>
	<?php endif; ?>
	<li><?php // echo CHtml::link('Approve Comments',array('comment/index')) . ' (' . Comment::model()->pendingCommentCount . ')'; ?></li>
	<li><?php echo CHtml::link('Logout',array('site/logout')); ?></li>
</ul>
