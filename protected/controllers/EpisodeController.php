<?php

class EpisodeController extends Controller
{
    private $_model;

	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view', 'list', 'feed' ),
				'users'=>array('*'),
			),
            array( 'allow', 'users' => array('@') ),

			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
        $post = $this->loadModel();

		$comment = $this->newComment( $post );

		$this->render('view',array(
			'model'=> $post,
			'comment' => $comment,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Post;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Post']))
		{
			$model->attributes=$_POST['Post'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Post']))
		{
			$model->attributes=$_POST['Post'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	public function actionList()
	{
		$this-> actionIndex();
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$this->pageTitle = 'Yii Radiio - Episode List';
		/*
		$dataProvider=new CActiveDataProvider('Post');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
		*/

		$criteria=new CDbCriteria(array(
			'condition'=>'status='.Post::STATUS_PUBLISHED . ' AND published_date<' . time(),
			'order'=>'published_date DESC',
			'with'=>'commentCount',
		));

		if(isset($_GET['tag']))	
		{
			$criteria->addSearchCondition('tags',$_GET['tag']);
		}

		$dataProvider=new CActiveDataProvider('Post', array(
				'pagination'=>array(
					'pageSize'=>5,
				),
				'criteria'=>$criteria,
			)
		);

		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Post('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Post']))
			$model->attributes=$_GET['Post'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 *
	 *
	 */
	public function actionFeed()
	{
		Yii::import('application.vendors.*');

		require_once 'Zend/Feed.php';
        require_once('Zend/Feed/Rss.php');

        $entries = array();

        foreach(Post::model()->findAll( 'status=' . Post::STATUS_PUBLISHED . ' AND published_date<'.time() . ' ORDER BY published_date DESC' ) as $post)
		{
			$entries[] = array(
				'title'			=> strip_tags($post->title),
				'link'			=> str_replace('&','&amp;',$this->createAbsoluteUrl('episode/view',array('id'=>$post->id))),
				'description'	=> $post->content,
				'lastUpdate'	=> $post->published_date,
				'itunes:author' => 'Imre Mehesz',
				'enclosure' => array(
					array(
						'url' 	=> 'http://yiiradiio.mehesz.net/downloads/' . $post->filename,
						'type' 	=> 'mp3'
					)
				)
			);
		}

        Zend_Feed::importArray(
						array(
								'title'=>Yii::app()->name,
								'link'=>Yii::app()->baseUrl,
								'charset'=>'UTF-8',
								'itunes'=>array(
										'author'        => 'Imre Mehesz',
										'owner'         => array( 'name'=>'Imre Mehesz'  ),
										'image'         => 'http://yiiradiio.mehesz.net/style/yii_radio_with_mic_150x170.png',
										'subtitle'      => 'a PHP related podcast focusing on the Yii framework',
										'category'      => array( 'main'=>'Technology','sub'=>'Podcast' ),
										'explicit'      => 'clean',
										'keywords'      => 'Yii,PHP,framework,web,development,programming',
										),
								'entries'=>$entries,
							 ), 'rss')->send();
		die();	

	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel()
	{
        if( $this->_model == null )
        {
            if( isset( $_GET['id'] ) )
            {
                if( Yii::app()->user->isGuest )
                {
                    // $condition = 'status='.Post::STATUS_PUBLISHED . ' OR status=' . Post::STATUS_APPROVED;
                    $condition = 'status='.Post::STATUS_PUBLISHED;
                }
                else
                {
                    $condition = '';
                }
                $this->_model = Post::model()->findByPk( $_GET['id'], $condition );
            }

            if( $this->_model == null )
            {
                throw new CHttpException( 404, 'The requested page does not exist.' );
            }
        }

		return $this->_model;
	}

	protected function newComment($post)
	{
		$comment=new Comment;

		if(isset($_POST['ajax']) && $_POST['ajax']==='comment-form')
		{
			echo CActiveForm::validate($comment);
			Yii::app()->end();
		}

		if(isset($_POST['Comment']))
		{
			$comment->attributes=$_POST['Comment'];
			if($post->addComment($comment))
			{
				if($comment->status==Comment::STATUS_PENDING)
				{
					Yii::app()->user->setFlash('commentSubmitted','Thank you...');
				}

				$this->refresh();
			}
		}

		return $comment;
	}


	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='post-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
