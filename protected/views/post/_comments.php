<div>
	<?php foreach ($comments as $comment) : ?>
		<div>
			<div><strong>Author:</strong> <?php echo $comment->name; ?></div> 
			<div><strong>Date:</strong> <?php echo date( 'm/d/Y H:i', $comment->create_time ); ?></div> 
			<div><strong>Comment:</strong><p><?php echo $comment->content; ?></p></div>
		</div>
	<?php endforeach; ?>
</div>
