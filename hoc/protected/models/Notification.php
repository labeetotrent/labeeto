<?php

/**
 * This is the model class for table "notification".
 *
 * The followings are the available columns in table 'notification':
 * @property integer $id
 * @property string $type
 * @property integer $target_id
 * @property integer $user_id
 * @property integer $author_id
 *
 * The followings are the available model relations:
 * @property Users $user
 * @property Users $author
 */
class Notification extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Notification the static model class
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
		return 'notification';
	}
    public function behaviors()
    {
        return array('datetimeI18NBehavior' => array('class' => 'ext.DateTimeI18NBehavior')); 
    }

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('type, user_id, author_id', 'required'),
			array('target_id, user_id, author_id', 'numerical', 'integerOnly'=>true),
			array('type', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, type, target_id, user_id, author_id', 'safe', 'on'=>'search'),
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
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
			'author' => array(self::BELONGS_TO, 'User', 'author_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('global', 'ID'),
			'type' => Yii::t('global', 'Type'),
			'target_id' => Yii::t('global', 'Target'),
			'user_id' => Yii::t('global', 'User'),
			'author_id' => Yii::t('global', 'Author'),
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
		$criteria->compare('type',$this->type,true);
		$criteria->compare('target_id',$this->target_id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('author_id',$this->author_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
    public static function getLastNotifications()
    {
        return self::model()->findAllByAttributes(array('user_id' => Yii::app()->user->getId()), array('limit' =>5, 'order' => 'id DESC'));
    }
    public static function countNotifications()
    {
        if(!Yii::app()->user->isGuest)
        {
            return Notification::model()->countByAttributes(array('user_id' => Yii::app()->user->getId(), 'is_read' => 0));
        }
        else
            return null;
    }
}