<div class="post">
			<h1 class="title"><?php echo CHtml::encode( $data->title );?>
			<?php if( $data->filename  ) : ?>
				<div style="float:right;">
					<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="150" height="20" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab">
						<param name="movie" value="<?php echo Yii::app()->request->baseUrl; ?>/media/singlemp3player.swf?file=<?php echo Yii::app()->request->baseUrl . '/downloads/' . $data->filename;?>" />
						<param name="wmode" value="transparent" />
						<embed wmode="transparent" width="150" height="20" src="<?php echo Yii::app()->request->baseUrl; ?>/media/singlemp3player.swf?file=<?php echo Yii::app()->request->baseUrl . '/downloads/' . $data->filename; ?>" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
					</object>
				</div>
			<?php endif; ?>
			</h1>
			<p class="byline"><small>Posted on <?php echo date( 'F jS, Y', $data->published_date ); ?> by <strong><?php echo $data->author->username; ?></strong> <?php if( ! Yii::app()->user->isGuest ):?> | <a href="<?php echo $this->createUrl( 'episode/update', array( 'id' => $data->id ) ); ?>">Edit</a><?php endif; ?></small></p>
			<div class="entry">
				<?php echo $data->content; ?>
			</div>
			<p class="meta"><a href="<?php echo $this->createUrl( 'episode/view', array( 'id' => $data->id, ) );?>#comments" class="comments">Comments</a></p>
			<p class="meta"><strong>Tags:</strong> <?php echo $data->tags; ?></p>
</div>
