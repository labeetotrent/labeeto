<?php

/**
 * This is the model class for table "location".
 *
 * The followings are the available columns in table 'location':
 * @property integer $id
 * @property string $name
 * @property string $address
 * @property string $city
 * @property string $country
 * @property double $lon
 * @property double $lat
 *
 * The followings are the available model relations:
 * @property Achievements[] $achievements
 */
class Location extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Location the static model class
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
		return 'location';
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
			array('name, address, lon, lat', 'required'),
			array('lon, lat', 'numerical'),
			array('name, address', 'length', 'max'=>255),
			array('city, country', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, address, city, country, lon, lat', 'safe', 'on'=>'search'),
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
			'achievements' => array(self::HAS_MANY, 'Achievements', 'location_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('global', 'ID'),
			'name' => Yii::t('global', 'Name'),
			'address' => Yii::t('global', 'Address'),
			'city' => Yii::t('global', 'City'),
			'country' => Yii::t('global', 'Country'),
			'lon' => Yii::t('global', 'Lon'),
			'lat' => Yii::t('global', 'Lat'),
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('country',$this->country,true);
		$criteria->compare('lon',$this->lon);
		$criteria->compare('lat',$this->lat);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}