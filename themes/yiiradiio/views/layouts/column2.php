<?php $this->beginContent('//layouts/main'); ?>
		<div id="content">

		<?php if( Yii::app()->user->isGuest ) : ?>
			<div style="text-align:center;margin-bottom:10px;" title='Yii Themes - your first step to be ridiculously good looking'>
				<a href="http://yiithemes.mehesz.net" target="_blank"><img src="http://yiiradiio.mehesz.net/images/banner_yiithemes.jpg" border="0" /></a>
			</div>
		<?php endif; ?>


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
				<h2>Facebook</h2>
				<ul>
					<li>
<iframe src="http://www.facebook.com/plugins/likebox.php?id=106735669387278&amp;width=275&amp;connections=12&amp;stream=false&amp;header=false&amp;height=300" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:275px; height:300px;" allowTransparency="true"></iframe>
					</li>
				</ul>
			</li>
			<?php /*
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
			*/ ?>
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
