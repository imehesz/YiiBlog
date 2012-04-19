<?php

class SiteController extends Controller
{

	public $layout='//layouts/column2';

	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
	    if($error=Yii::app()->errorHandler->error)
	    {
	    	if(Yii::app()->request->isAjaxRequest)
	    		echo $error['message'];
	    	else
	        	$this->render('error', $error);
	    }
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				//$headers="From: {$model->email}\r\nReply-To: {$model->email}";
				$headers="From: imehesz@mehesz.net\r\nReply-To: imehesz@mehesz.net";
                $subject = 'Yii Radiio Contact Form: ' . $model->subject;
                $body = 'Email: ' . $model->email . "\r\n\r\n" . $model->body;
                if(	mail(Yii::app()->params['adminEmail'],$subject,$body,$headers) )
                {
				    Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
                }
                else
                {
                    Yii::app()->user->setFlash( 'contact', 'Oops, something happened, please try again :/' );
                }
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

	public function actionSponsor()
	{
		if( ! empty( Yii::app()->params['sponsors'] ) )
		{
			$sponsors = Yii::app()->params['sponsors'];
			$this->render( 'sponsor', array( 'sponsors' => $sponsors ) );
		}
	}

	public function actionYeti()
	{
		$model=new Yeti;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Yeti']))
		{
			$model->attributes=$_POST['Yeti'];
			if($model->save())
			{
				Yii::app()->user->setFlash( 'yetiadded', 'Thank you for submitting!' );
			}
		}

		$this->render( 'yeti', array( 'model' => $model ) );
	}

	public function actionAdminYeti()
	{
		if( Yii::app()->user->isGuest )
		{
			throw new CHttpException( 403, 'Oops! Meh?' );
		}

		$model=new Yeti('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Yeti']))
			$model->attributes=$_GET['Yeti'];

		$this->render('adminyeti',array(
			'model'=>$model,
		));
	}
}
