<?php

/**
 * This is the model class for table "Yeti".
 *
 * The followings are the available columns in table 'Yeti':
 * @property integer $id
 * @property integer $yiiuser_id
 * @property string $yiiuser_name
 * @property string $email_address
 * @property string $comment
 * @property string $ipaddress
 *
 * The followings are the available model relations:
 */
class Yeti extends CActiveRecord
{

	public $verifyCode;
	/**
	 * Returns the static model of the specified AR class.
	 * @return Yeti the static model class
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
		return 'Yeti';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('yiiuser_id, yiiuser_name, email_address, comment, ipaddress', 'required'),
			array('yiiuser_id', 'numerical', 'integerOnly'=>true),
			array('yiiuser_name, email_address', 'length', 'max'=>255),
			array('email_address', 'email', 'allowEmpty' => false ),
			array('ipaddress', 'length', 'max'=>100),

			array('verifyCode', 'captcha', 'allowEmpty'=>!extension_loaded('gd')),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, yiiuser_id, yiiuser_name, email_address, comment, ipaddress', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'yiiuser_id' => 'Yii User ID',
			'yiiuser_name' => 'Yii User Name',
			'email_address' => 'Your Email Address',
			'comment' => 'Reason',
			'ipaddress' => 'Ipaddress',
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
		$criteria->compare('yiiuser_id',$this->yiiuser_id);
		$criteria->compare('yiiuser_name',$this->yiiuser_name,true);
		$criteria->compare('email_address',$this->email_address,true);
		$criteria->compare('comment',$this->comment,true);
		$criteria->compare('ipaddress',$this->ipaddress,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}

	public function beforeValidate()
	{
		if( $this->isNewRecord )
		{
			$this->ipaddress = $_SERVER['REMOTE_ADDR'];
			$this->created_at = new CDbExpression('NOW()');
		}

		return parent::beforeValidate();
	}
}
