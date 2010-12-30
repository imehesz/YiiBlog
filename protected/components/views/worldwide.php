<ul>
	<li>
		<?php for( $i=0; $i<sizeof( $countries ); $i++ ) : ?>
			<?php
				$name 	= $countries[$i][0];
				$link	= $countries[$i][1];
				$src	= $countries[$i][2];

				echo CHtml::link( CHtml::image( $src, null, array( 'border' => 0 ) ), $link, array( 'title' => $name, 'target' => '_blank' ) ); 
			?>
		<?php endfor; ?>
	</li>
</ul>
