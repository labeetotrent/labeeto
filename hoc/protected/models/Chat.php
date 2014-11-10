<?php

/**
 * This is the model class for table "chat".
 *
 * The followings are the available columns in table 'chat':
 * @property integer $id
 * @property string $user_to
 * @property string $user_from
 * @property string $message
 * @property integer $is_read
 * @property string $created
 * @property string $updated
 */
class Chat extends CActiveRecord
{
    const STATUS_READ =  1;
    /**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Chat the static model class
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
		return 'chat';
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
            array('user_to, user_from', 'required'),
			array('is_read', 'numerical', 'integerOnly'=>true),
            array('user_to, user_from', 'length', 'max'=>100),
			array('message, created, updated', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, to, from, message, is_read, created, updated', 'safe', 'on'=>'search'),
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
			'id' => Yii::t('global', 'ID'),
            'user_to'  => Yii::t('global','User To'),
            'user_from'=> Yii::t('global','User From'),
			'message'  => Yii::t('global', 'Message'),
			'is_read'  => Yii::t('global', 'Is Read'),
			'created'  => Yii::t('global', 'Created'),
			'updated'  => Yii::t('global', 'Updated'),
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

		$criteria->compare('t.id',$this->id);
        $criteria->compare('user_to',$this->user_to,true);
        $criteria->compare('user_from',$this->user_from,true);
		$criteria->compare('message',$this->message,true);
		$criteria->compare('is_read',$this->is_read);
        if ($this->created)
            $criteria->compare('t.created', date('Y-m-d ', strtotime($this->created)), true);
		$criteria->compare('updated',$this->updated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'pagination' => array(  'pageSize'=>Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']),
            ),
		));
	}

    function getStatus(){
        $status = Yii::t('global','Unread');
        if( $this->is_read == self::STATUS_READ )
            $status = Yii::t('global','Read');
        return $status;
    }

    function getActiveChat(){
        $active_chat = array(
            Yii::t('global','Unread'),
            Yii::t('global','Read')
        );
        return $active_chat;
    }
    function getDataByStatus( $name ){
        if( $this->is_read != self::STATUS_READ )
            $name = '<b>'.$name.'</b>';
        return $name;
    }
    function getUsername(){
        return Yii::app()->user->username;
    }

}