<div class="post">
			<h1 class="title"><?php echo CHtml::encode( $data->title );?></h1>
			<p class="byline"><small>Posted on <?php echo date( 'F jS, Y', $data->published_date ); ?> by <strong><?php echo $data->author->username; ?></strong> <?php if( ! Yii::app()->user->isGuest ):?> | <a href="<?php echo $this->createUrl( 'post/update', array( 'id' => $data->id ) ); ?>">Edit</a><?php endif; ?></small></p>
			<div class="entry">
				<?php echo $data->content; ?>
			</div>
			<p class="meta"><a href="<?php echo $this->createUrl( 'post/view', array( 'id' => $data->id, ) );?>" class="more">Read More</a> &nbsp;&nbsp;&nbsp; <a href="#" class="comments">Comments (33)</a></p>
			<p class="meta"><strong>Tags:</strong> <?php echo $data->tags; ?></p>
</div>
