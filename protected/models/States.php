<?php

/**
 * This is the model class for table "states".
 *
 * The followings are the available columns in table 'states':
 * @property integer $id
 * @property integer $country_id
 * @property string $name
 * @property string $Code
 * @property string $ADM1Code
 */
class States extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return States the static model class
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
		return 'states';
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
			array('country_id', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>45),
			array('Code', 'length', 'max'=>8),
			array('ADM1Code', 'length', 'max'=>4),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, country_id, name, Code, ADM1Code', 'safe', 'on'=>'search'),
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
			'country_id' => Yii::t('global', 'Country'),
			'name' => Yii::t('global', 'Name'),
			'Code' => Yii::t('global', 'Code'),
			'ADM1Code' => Yii::t('global', 'Adm1 Code'),
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
		$criteria->compare('country_id',$this->country_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('Code',$this->Code,true);
		$criteria->compare('ADM1Code',$this->ADM1Code,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}