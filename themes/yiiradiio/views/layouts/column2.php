<?php $this->beginContent('//layouts/main'); ?>
		<div id="content" style="overflow:hidden;">

		<?php if( Yii::app()->user->isGuest ) : ?>
			<div  class="sponsor">
                <?php if( $this->beginCache( 'adcache', array( 'duration' => 3600 ) ) ) : ?>
                    <?php $this->widget( 'ReklamWidget', array( 'domain' => 'yiiradiio' ) ); ?>
                <?php $this->endCache(); endif; ?>
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
					<h2>about us</h2>
					<ul>
						<li>
							<b>Yii Radiio</b> is the first, and so far <u>only</u>, online <b>podcast</b> that specifically focuses on the <b>Yii (PHP) framework</b>. <p>We bring the latest activities from the <b>Yii</b> community to listeners all over the world.</p> <p><b>Thank you all</b> for listening.</p>
							<?php /*
							<strong>Imre Mehesz</strong> (me) a long time <strong>open source</strong> and <strong>PHP</strong> enthusiast. Started with PHP 3 and grew into the MVC world with CakePHP, Zend Framework and now the <strong>Yii Framework</strong>. <?php // echo CHtml::link( 'read more', $this->createUrl( 'site/page', array( 'view' => 'about' ) ) ); ?> */
							?>
						</li>
					</ul>
				</li>
			</ul>

			<ul>
				<li>
					<h2>hosting</h2>
					<ul>
						<li>
							<?php echo CHtml::link( 'Web Site Hosting', 'http://webhostinggeeks.com/', array( 'target' => '_blank' ) ) ?>
						</li>
						<li>
							<?php echo CHtml::link( 'Blog Web Host', 'http://www.webhostinghub.com/blog-hosting.html', array( 'target' => '_blank' ) ) ?>
						</li>

					</ul>
				</li>
			</ul>
			<ul>
				<li>
					<h2>got something?</h2>
					<ul>
						<li>
							If you heard, read or wrote something that you would like to share with the <b>Yii Community</b>, <?php echo CHtml::link( 'contact us', $this->createUrl('site/contact') ); ?>  and we will make sure to put that in the next episode. <br />
							<a href="skype:yiiradiio?call"><img src="http://download.skype.com/share/skypebuttons/buttons/call_green_white_153x63.png" style="border: none;margin-left:20px;" width="153" height="63" alt="Skype Me™!" /></a>
							<br /><a href="http://www.skype.com/go/download">Get Skype</a> and call me for free.<br /><br />
						</li>
					</ul>
				</li>
			</ul>


			<ul>
				<li>
					<?php $this->widget( 'LatestFive' ); ?>
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

		<ul>
			<li>
				<h2>twitter</h2>
				<div id="dwitter_user"></div>
			</li>
		</ul>

		<ul>
			<li>
				<h2>feeds</h2>
				<ul>
					<li>
						<?php echo CHtml::link( CHtml::image( Yii::app()->theme->baseUrl . '/images/feed-icon16x16.png', null, array( 'border' => 0 ) ) . ' Subscribe via RSS','http://feeds.feedburner.com/YiiRadiio-APodcastAboutTheYiiphpFramework' ); ?>
					</li>
					<li>
						<?php echo CHtml::link( CHtml::image( Yii::app()->theme->baseUrl . '/images/itunes_logo.gif', null, array('border' => 0) ) . ' Subscribe via iTunes','http://itunes.apple.com/WebObjects/MZStore.woa/wa/viewPodcast?id=325740146' ); ?>
					</li>
				</ul>
			</li>
		</ul>

		<ul>
			<li>
				<?php $this->widget( 'WorldWide' ); ?>
			</li>
		</ul>


		<ul>
			<li>
				<h2>archives</h2>
				<ul>
					<li><a href="http://yiiradiio.mehesz.net/downloads/episodes0110.zip">Episodes 1-10</a> (55Mb)</li>
					<li><a href="http://yiiradiio.mehesz.net/downloads/episodes1120.zip">Episodes 11-20</a> (45Mb)</li>
					<li><a href="http://yiiradiio.mehesz.net/downloads/episodes2130.zip">Episodes 21-30</a> (55Mb)</li>
					<li><a href="http://yiiradiio.mehesz.net/downloads/episodes3140.zip">Episodes 31-40</a> (70Mb)</li>
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
<script language="javascript">
$(document).ready(function(){
	var userUpdates = function()
	{
		$('#dwitter_user').fadeOut();
		$('#dwitter_user').html('');
		$("#dwitter_user").tweet({
			username: "yiiframework",
			join_text: "auto",
			avatar_size: '20px',
			count: 3,
			auto_join_text_default: "", 
			auto_join_text_ed: "",
			auto_join_text_ing: "",
			auto_join_text_reply: "replied to",
			auto_join_text_url: "",
			loading_text: "loading tweets..."
		});
	$('#dwitter_user').fadeIn();
	}
	userUpdates();
});
</script>
