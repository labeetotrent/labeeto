<?php

/**
 * This is the model class for table "city_master".
 *
 * The followings are the available columns in table 'city_master':
 * @property integer $city_id
 * @property integer $CountryID
 * @property integer $state_id
 * @property string $city_name
 * @property double $Latitude
 * @property double $Longitude
 * @property string $TimeZone
 * @property integer $DmaId
 * @property string $County
 * @property string $Code
 */
class CityMaster extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CityMaster the static model class
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
		return 'city_master';
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
			array('CountryID, state_id, DmaId', 'numerical', 'integerOnly'=>true),
			array('Latitude, Longitude', 'numerical'),
			array('city_name', 'length', 'max'=>45),
			array('TimeZone', 'length', 'max'=>10),
			array('County', 'length', 'max'=>25),
			array('Code', 'length', 'max'=>4),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('city_id, CountryID, state_id, city_name, Latitude, Longitude, TimeZone, DmaId, County, Code', 'safe', 'on'=>'search'),
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
			'city_id' => Yii::t('global', 'City'),
			'CountryID' => Yii::t('global', 'Country'),
			'state_id' => Yii::t('global', 'State'),
			'city_name' => Yii::t('global', 'City Name'),
			'Latitude' => Yii::t('global', 'Latitude'),
			'Longitude' => Yii::t('global', 'Longitude'),
			'TimeZone' => Yii::t('global', 'Time Zone'),
			'DmaId' => Yii::t('global', 'Dma'),
			'County' => Yii::t('global', 'County'),
			'Code' => Yii::t('global', 'Code'),
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

		$criteria->compare('city_id',$this->city_id);
		$criteria->compare('CountryID',$this->CountryID);
		$criteria->compare('state_id',$this->state_id);
		$criteria->compare('city_name',$this->city_name,true);
		$criteria->compare('Latitude',$this->Latitude);
		$criteria->compare('Longitude',$this->Longitude);
		$criteria->compare('TimeZone',$this->TimeZone,true);
		$criteria->compare('DmaId',$this->DmaId);
		$criteria->compare('County',$this->County,true);
		$criteria->compare('Code',$this->Code,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}