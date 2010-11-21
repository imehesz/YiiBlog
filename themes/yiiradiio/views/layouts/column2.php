<?php $this->beginContent('//layouts/main'); ?>
		<div id="content">
			<?php echo $content; ?>
		</div><!-- content -->
		<div id="sidebar">
			<ul>
				<li>
					<?php if(!Yii::app()->user->isGuest) $this->widget('UserMenu'); ?>
				</li>
			</ul>

			<ul>
				<li>
					<h2>about</h2>
					<ul>
						<li>
							<strong>Imre Mehesz</strong> (me) a long time <strong>open source</strong> and <strong>PHP</strong> enthusiast. Started with PHP 3 and grew into the MVC world with CakePHP, Zend Framework and now the <strong>Yii Framework</strong>.							
						</li>
					</ul>
				</li>
			</ul>
		
			<ul>
				<li>
			<?php $this->widget('TagCloud', array(
				'maxTags'=>Yii::app()->params['tagCloudCount'],
			)); ?>
				</li>
			</ul>

		<ul>
			<li>
				<h2>Categories</h2>
				<ul>
					<li><a href="#">Aliquam libero</a></li>
					<li><a href="#">Consectetuer adipiscing elit</a></li>
					<li><a href="#">metus aliquam pellentesque</a></li>
					<li><a href="#">Suspendisse iaculis mauris</a></li>
					<li><a href="#">Urnanet non molestie semper</a></li>
					<li><a href="#">Proin gravida orci porttitor</a></li>
				</ul>
			</li>
			<li>
				<h2>Archives</h2>
				<ul>
					<li><a href="#">September</a> (23)</li>
					<li><a href="#">August</a> (31)</li>
					<li><a href="#">July</a> (31)</li>
					<li><a href="#">June</a> (30)</li>
					<li><a href="#">May</a> (31)</li>
					<li><a href="#">April</a> (30)</li>
					<li><a href="#">March</a> (31)</li>
					<li><a href="#">February</a> (28)</li>
					<li><a href="#">January</a> (31)</li>
				</ul>
			</li>
		</ul>

		<?php
			/*
			$this->beginWidget('zii.widgets.CPortlet', array(
				'title'=>'Operations',
			));
			$this->widget('zii.widgets.CMenu', array(
				'items'=>$this->menu,
				'htmlOptions'=>array('class'=>'operations'),
			));
			$this->endWidget();
			*/
		?>
		</div><!-- sidebar -->
<?php $this->endContent(); ?>
