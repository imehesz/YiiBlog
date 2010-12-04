<?php
	Yii::import( 'zii.widgets.CPortlet'  );

	/**
	 * 
	 **/
	class LatestFive extends CPortlet
	{
		public function init()
		{
			$this->title= '<h2>latest five</h2>';//CHtml::encode(Yii::app()->user->name);
			parent::init();
		}

		protected function renderContent()
		{
			// code...
			$model = Post::model()->findAll( 'status=' . Post::STATUS_PUBLISHED . ' AND published_date<' . time() . ' ORDER BY published_date DESC LIMIT 5' );
			$this->render( 'latestFive', array( 'latest_five' => $model ) );
		}
	}
