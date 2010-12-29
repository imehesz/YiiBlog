<div class="post">
			<h1 class="title"><?php echo CHtml::encode( $data->title );?>
				<div style="float:right;">
					<?php if( Yii::app()->controller->action->id != 'list' ) : ?>
					<!-- AddThis Button BEGIN -->
						<a class="addthis_button" href="http://www.addthis.com/bookmark.php?v=250&amp;username=xa-4d1aa8003070ad2e"><img src="http://s7.addthis.com/static/btn/v2/lg-share-en.gif" width="125" height="16" alt="Bookmark and Share" style="border:0"/></a>
						<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#username=xa-4d1aa8003070ad2e"></script>
					<!-- AddThis Button END -->
					<?php endif; ?>

					<?php if( $data->filename  ) : ?>
							<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="150" height="20" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab">
								<param name="movie" value="<?php echo Yii::app()->request->baseUrl; ?>/media/singlemp3player.swf?file=<?php echo Yii::app()->request->baseUrl . '/downloads/' . $data->filename;?>" />
								<param name="wmode" value="transparent" />
								<embed wmode="transparent" width="150" height="20" src="<?php echo Yii::app()->request->baseUrl; ?>/media/singlemp3player.swf?file=<?php echo Yii::app()->request->baseUrl . '/downloads/' . $data->filename; ?>" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
							</object>
					<?php endif; ?>
				</div>
			</h1>
			<p class="byline"><small>Posted on <?php echo date( 'F jS, Y', $data->published_date ); ?> by <strong><?php echo $data->author->username; ?></strong> <?php if( ! Yii::app()->user->isGuest ):?> | <a href="<?php echo $this->createUrl( 'episode/update', array( 'id' => $data->id ) ); ?>">Edit</a><?php endif; ?></small></p>
			<div class="entry">
				<?php if( Yii::app()->controller->action->id == 'list' || isset( $_GET['tag'] ) ) : ?>
					<?php echo substr( strip_tags( $data->content ),0 , 500 ); ?> ...
				<?php else: ?>
					<?php echo $data->content; ?>
				<?php endif; ?>
			</div>
			<?php if( Yii::app()->controller->action->id != 'view' ) : ?>
					<p class="meta">
						<a href="<?php echo $this->createUrl( 'episode/view', array( 'id' => $data->id, ) );?>" class="more">read more</a>&nbsp;
						<a href="<?php echo $this->createUrl( 'episode/view', array( 'id' => $data->id, ) );?>#comments" class="comments">comments</a>
					</p>
			<?php endif; ?>
			<p class="meta"><strong>Tags:</strong> <?php echo $data->tags; ?></p>
</div>
