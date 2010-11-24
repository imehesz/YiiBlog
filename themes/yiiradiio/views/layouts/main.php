<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by Free CSS Templates
http://www.freecsstemplates.org
Released for free under a Creative Commons Attribution 2.5 License

Name       : Unqualified
Description: A two-column, fixed-width design.
Version    : 1.0
Released   : 20071220

-->
<html dir="ltr" lang="en-US" xmlns:fb="http://www.facebook.com/2008/fbml" xmlns:og="http://opengraphprotocol.org/schema/">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Yii Radiio - a PHP podcast focusing on the Yii framework</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="<?php echo Yii::app()->theme->baseUrl ?>/css/default.css" rel="stylesheet" type="text/css" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
</head>
<body>
<!-- start header -->
<div id="header">
	<div id="logo">
		<h1><a href="/"><img src="<?php echo Yii::app()->theme->baseUrl;?>/images/yii-icon.png" border="0" /> Yii Radiio</a></h1>
		<p><a href="http://yiiframework.com">a PHP podcast focusing on the Yii framework</a></p>
	</div>
	<div id="menu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),
				array('label'=>'Forum', 'url'=> 'http://www.yiiframework.com/forum/index.php?/topic/3179-yii-radiio-podcast/' ),
				array('label'=>'Episodes', 'url'=>array('/post'), 'active' => $this->id == 'post' ? true : null ),
				array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
				/*
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),*/
				array('label'=>'Contact', 'url'=>array('/site/contact')),
			),
		)); ?>
	</div>
</div>
<!-- end header -->
<!-- start page -->
<div id="page">
	<!-- start content -->
		<?php echo $content; ?>
	<!-- end content -->
</div>
<!-- end page -->
<div id="footer">
	<p>&copy;<?php echo date('Y', time() ); ?> All Rights Reserved. &nbsp;&bull;&nbsp; <a href="http://mehesz.net">mehesz<span style="color:red;">.</span>net</a> &nbsp;&bull;&nbsp; making the web. better.</p>
</div>
</body>
</html>
