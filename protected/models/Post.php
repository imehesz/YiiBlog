<?php

/**
 * This is the model class for table "Posts".
 *
 * The followings are the available columns in table 'Posts':
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property string $tags
 * @property integer $status
 * @property string $create_time
 * @property string $update_time
 * @property integer $userID
 *
 * The followings are the available model relations:
 */
class Post extends CActiveRecord
{
    const STATUS_DRAFT=1;
    const STATUS_PUBLISHED=2;
    const STATUS_ARCHIVED=3;

	public $published_date_calendar;
	public $published_hour;
	public $published_min;
	public $published_ampm;

    private $_oldTags;

	/**
	 * Returns the static model of the specified AR class.
	 * @return Post the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Posts';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
            array( 'published_date, title, content, status',        'required' ),
            array( 'title, 
					published_date_calendar, 
					published_hour, 
					published_min, 
					published_ampm',                'length', 'max' => 128 ),
            array( 'status',                        'in', 'range' => array(1,2,3) ),
            array( 'tags',                          'match', 'pattern'=>'/^[\w\s,]+$/', 'message' => 'Tags can only contain word chars.' ),
            array( 'tags',                          'normalizeTags' ),
            array( 'title,status',                  'safe', 'on' => 'search' ),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
            'author'        => array( self::BELONGS_TO,     'User',         'userID' ),
            'comments'      => array( self::HAS_MANY,       'Comment',      'post_id',
                            'condition' => 'comments.status='.Comment::STATUS_APPROVED,
                            'order'     => 'comments.create_time DESC' ),
            'commentCount'  => array( self::STAT, 'Comment', 'post_id',
                            'condition' => 'status='.Comment::STATUS_APPROVED )
            
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Title',
			'content' => 'Content',
			'tags' => 'Tags',
			'status' => 'Status',
			'create_time' => 'Create Time',
			'update_time' => 'Update Time',
			'userID' => 'User',
			'published_date' => 'Published Date',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('tags',$this->tags,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('update_time',$this->update_time,true);
		$criteria->compare('userID',$this->userID);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}

    /**
     *
     */
    public function normalizeTags( $attribute, $params )
    {
        $this->tags=Tag::array2string( array_unique( Tag::string2array( $this->tags ) ) );
    }

    /**
     *
     */
    public function getUrl()
    {
        return Yii::app()->createUrl('post/view', array( 'id' => $this->id, 'title' => $this->title ) );
    }

	public function beforeValidate()
	{
		$this->published_date = strtotime( $this->published_date_calendar . ' ' . ($this->published_hour+1) . ':' . $this->published_min . $this->published_ampm );

		return parent::beforeValidate();
	}

    public function beforeSave()
    {
        if( parent::beforeSave() )
        {
            if( $this->isNewRecord )
            {
                $this->create_time = $this->update_time = time();
                $this->userID = Yii::app()->user->id;
				if( ! $this->published_date )
				{
					$this->published_date = time();
				}
            }
            else
            {
                $this->update_time = time();
            }

            return true;
        }
        else
        {
            return false;
        }
        // code...
    }

	/**
	 *
	 */
    public function afterSave()
    {
        parent::afterSave();
        Tag::model()->updateFrequency( $this->_oldTags, $this->tags );
        // code...
    }

	/**
	 *
	 */
    public function afterFind()
    {
        parent::afterFind();
        $this->_oldTags = $this->tags;
        // code...
    }

	/**
	 *
	 */
	public function afterDelete()
	{
		parent::afterDelete();
		Comment::model()->deleteAll( 'post_id='.$this->id );
		Tag::model()->updateFrequency( $this->tags, '' );
	}

	public function addComment( $comment )
	{
		$comment->post_id = $this->id;
		return $comment->save();
	}
}
