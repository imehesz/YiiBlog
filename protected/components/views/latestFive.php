<ul>
	<?php if ( sizeof( $latest_five ) ): ?>
		<?php foreach ($latest_five as $episode): ?>
			<li>
				<?php echo CHtml::link( $episode->title, Yii::app()->controller->createUrl( 'episode/view', array( 'id' => $episode->id ) ) ); ?> - <?php echo date( 'M d.', $episode->published_date ); ?>
			</li>
		<?php endforeach; ?>
	<?php else: ?>
		sorry, no episodes ...
	<?php endif; ?>
</ul>
