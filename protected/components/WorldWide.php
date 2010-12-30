<?php
	Yii::import( 'zii.widgets.CPortlet'  );

	/**
	 * 
	 **/
	class WorldWide extends CPortlet
	{
		public function init()
		{
			$this->title= '<h2>yii worldwide</h2>';//CHtml::encode(Yii::app()->user->name);
			parent::init();
		}

		protected function renderContent()
		{
			// code...
			$countries = array(
				array( 
						'Hungary',
						'http://yiihun.blogspot.com/',
						'http://motorolafans.cz/en/pics/hungarian-flag.png',
				),

				array(
						'France',
						'http://www.yiiframework.fr/',
						'https://www.gypsyguide.com/canada/assets/images/french-flag-small.PNG'
				),

				array(
						'Russia',
						'http://yiiframework.ru/',
						'http://www.etype.com/wp-content/uploads/2010/11/flag_russian.bmp'
				),
			);
			$this->render( 'worldwide', array( 'countries' => $countries ) );
		}
	}
