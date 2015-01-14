<?php

/**
 * This is the model class for table "fitmatch".
 *
 * The followings are the available columns in table 'fitmatch':
 * @property integer $id
 * @property integer $from_user
 * @property integer $to_user
 * @property integer $result
 *
 * The followings are the available model relations:
 * @property Users $fromUser
 * @property Users $toUser
 */
class Fitmatch extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Fitmatch the static model class
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
		return 'fitmatch';
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
			array('from_user, to_user, result', 'required'),
			array('from_user, to_user, result', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, from_user, to_user, result', 'safe', 'on'=>'search'),
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
			'fromUser' => array(self::BELONGS_TO, 'Users', 'from_user'),
			'toUser' => array(self::BELONGS_TO, 'Users', 'to_user'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('global', 'ID'),
			'from_user' => Yii::t('global', 'From User'),
			'to_user' => Yii::t('global', 'To User'),
			'result' => Yii::t('global', 'Result'),
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
		$criteria->compare('from_user',$this->from_user);
		$criteria->compare('to_user',$this->to_user);
		$criteria->compare('result',$this->result);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}