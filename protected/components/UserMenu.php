<?php
	Yii::import( 'zii.widgets.CPortlet'  );

	/**
	 * 
	 **/
	class UserMenu extends CPortlet
	{
		public function init()
		{
			$this->title= '<h2>admin</h2>';//CHtml::encode(Yii::app()->user->name);
			parent::init();
		}

		protected function renderContent()
		{
			// code...
			$this->render( 'userMenu' );
		}
	}
