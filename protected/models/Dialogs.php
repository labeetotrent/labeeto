<?php

/**
 * This is the model class for table "dialogs".
 *
 * The followings are the available columns in table 'dialogs':
 * @property string $created
 * @property string $userid
 * @property string $Col_placeholder1
 * @property string $totalMessages
 * @property string $unreadMessages
 * @property integer $id
 * @property string $username
 * @property string $photo
 */
class Dialogs extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Dialogs the static model class
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
		return 'dialogs';
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
			array('id', 'numerical', 'integerOnly'=>true),
			array('userid', 'length', 'max'=>11),
			array('totalMessages, unreadMessages', 'length', 'max'=>21),
			array('username, photo', 'length', 'max'=>155),
			array('created, Col_placeholder1', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('created, userid, Col_placeholder1, totalMessages, unreadMessages, id, username, photo', 'safe', 'on'=>'search'),
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
			'created' => Yii::t('global', 'Created'),
			'userid' => Yii::t('global', 'Userid'),
			'Col_placeholder1' => Yii::t('global', 'Col Placeholder1'),
			'totalMessages' => Yii::t('global', 'Total Messages'),
			'unreadMessages' => Yii::t('global', 'Unread Messages'),
			'id' => Yii::t('global', 'ID'),
			'username' => Yii::t('global', 'Username'),
			'photo' => Yii::t('global', 'Photo'),
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

		$criteria->compare('created',$this->created,true);
		$criteria->compare('userid',$this->userid,true);
		$criteria->compare('Col_placeholder1',$this->Col_placeholder1,true);
		$criteria->compare('totalMessages',$this->totalMessages,true);
		$criteria->compare('unreadMessages',$this->unreadMessages,true);
		$criteria->compare('id',$this->id);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('photo',$this->photo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}