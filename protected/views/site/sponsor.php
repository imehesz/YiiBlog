<h1>Our sponsors</h1>
<p>
If you would like to be a sponsor, please <?php echo CHtml::link( 'contact us', Yii::app()->controller->createUrl( '/site/contact' ) ); ?>.
</p>
<?php if( sizeof( $sponsors ) ) : ?>
	<?php for( $i=0; $i<sizeof($sponsors);$i++ ) : ?>
		<div style="margin-bottom: 15px;">
			<?php
				$sponsor = $sponsors[$i];
				echo CHtml::link( CHtml::image( $sponsor['pic'], null, array( 'width' => 468 ) ) , $sponsor['url'], array( 'target' => '_blank', 'title' => $sponsor['text'] ) );
			?>
		</div>
	<?php endfor; ?>
<?php endif; ?>
