<?php
$this->breadcrumbs=array(
	$model->title,
);
$this->pageTitle=$model->title;
?>

<?php $this->renderPartial('_view', array( 'data'=>$model,)); ?>

<?php /*
<div id="comments">
	<h3>Leave a Comment</h3>

	<?php if(Yii::app()->user->hasFlash('commentSubmitted')): ?>
		<div class="flash-success">
			<?php echo Yii::app()->user->getFlash('commentSubmitted'); ?>
		</div>
	<?php else: ?>
		<?php $this->renderPartial('/comment/_form',array(
			'model'=>Comment::model(),
		)); ?>
	<?php endif; ?>

	<?php if($model->commentCount>=1): ?>
		<h3>
			<?php echo $model->commentCount>1 ? $model->commentCount . ' comments' : 'One comment'; ?>
		</h3>

		<?php $this->renderPartial('_comments',array(
			'post'=>$model,
			'comments'=>$model->comments,
		)); ?>
	<?php endif; ?>

</div><!-- comments -->
*/ ?>

<h2>Comments: </h2>
<div id="fb-root"></div>
<script>
window.fbAsyncInit = function() {
		FB.init({appId: '171739672855626', status: true, cookie: true,
						xfbml: true});
};
(function() {
 var e = document.createElement('script');
 e.type = 'text/javascript';
 e.src = document.location.protocol +
 '//connect.facebook.net/en_US/all.js';
 e.async = true;
 document.getElementById('fb-root').appendChild(e);
 }());
</script>

<a name='comments'></a>
<div id="fb-root"></div><script src="http://connect.facebook.net/en_US/all.js#appId=171739672855626&amp;xfbml=1"></script><fb:comments xid="<?php echo 'yiiradiio_comments_' . $model->id; ?>" numposts="10" width="575" publish_feed="true"></fb:comments>
