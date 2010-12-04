<?php

Yii::import('zii.widgets.CPortlet');

class TagCloud extends CPortlet
{
	public $title='<h2>Tags</h2>';
	public $maxTags=20;

	protected function renderContent()
	{
		$tags=Tag::model()->findTagWeights($this->maxTags);

		echo '<ul><li>';

		foreach($tags as $tag=>$weight)
		{
			$link=CHtml::link(CHtml::encode($tag), array('episode/index','tag'=>$tag));
			echo CHtml::tag(
						'span', array(
										'class'=>'tag',
										'style'=>"font-size:{$weight}pt",
						), 
						$link )."\n";
		}
		
		echo '</li></ul>';
	}
}
