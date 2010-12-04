<?php $this->pageTitle=Yii::app()->name; ?>

<h1>Welcome to the <b>Yii Radiio</b> site</h1>

<p>Please read and/or listen to the latest episode below. If you would like to browse through some older ones, please go to our <?php echo CHtml::link( 'episodes', $this->createUrl( '/post' ) ); ?> section.</p>

<p>Thanks, and enjoy :)</p>

<?php echo $this->renderPartial( '//episode/_view', array( 'data' => Post::model()->find( 'status=' . Post::STATUS_PUBLISHED . ' AND published_date<' . time() . ' ORDER BY published_date DESC' ) ) ); ?>
