<?php

/**
 * This is the model class for table "countries".
 *
 * The followings are the available columns in table 'countries':
 * @property integer $id
 * @property string $country_name
 * @property string $FIPS104
 * @property string $ISO2
 * @property string $ISO3
 * @property string $ISON
 * @property string $Internet
 * @property string $Capital
 * @property string $MapReference
 * @property string $NationalitySingular
 * @property string $NationalityPlural
 * @property string $Currency
 * @property string $CurrencyCode
 * @property string $Population
 * @property string $Title
 * @property string $Comment
 * @property integer $is_paypal
 */
class Countries extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Countries the static model class
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
		return 'countries';
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
			array('is_paypal', 'numerical', 'integerOnly'=>true),
			array('country_name, MapReference, Title', 'length', 'max'=>50),
			array('FIPS104, ISO2, Internet', 'length', 'max'=>2),
			array('ISO3, CurrencyCode', 'length', 'max'=>3),
			array('ISON', 'length', 'max'=>4),
			array('Capital', 'length', 'max'=>25),
			array('NationalitySingular, NationalityPlural', 'length', 'max'=>35),
			array('Currency', 'length', 'max'=>30),
			array('Population', 'length', 'max'=>20),
			array('Comment', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, country_name, FIPS104, ISO2, ISO3, ISON, Internet, Capital, MapReference, NationalitySingular, NationalityPlural, Currency, CurrencyCode, Population, Title, Comment, is_paypal', 'safe', 'on'=>'search'),
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
			'country_name' => Yii::t('global', 'Country Name'),
			'FIPS104' => Yii::t('global', 'Fips104'),
			'ISO2' => Yii::t('global', 'Iso2'),
			'ISO3' => Yii::t('global', 'Iso3'),
			'ISON' => Yii::t('global', 'Ison'),
			'Internet' => Yii::t('global', 'Internet'),
			'Capital' => Yii::t('global', 'Capital'),
			'MapReference' => Yii::t('global', 'Map Reference'),
			'NationalitySingular' => Yii::t('global', 'Nationality Singular'),
			'NationalityPlural' => Yii::t('global', 'Nationality Plural'),
			'Currency' => Yii::t('global', 'Currency'),
			'CurrencyCode' => Yii::t('global', 'Currency Code'),
			'Population' => Yii::t('global', 'Population'),
			'Title' => Yii::t('global', 'Title'),
			'Comment' => Yii::t('global', 'Comment'),
			'is_paypal' => Yii::t('global', 'Is Paypal'),
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
		$criteria->compare('country_name',$this->country_name,true);
		$criteria->compare('FIPS104',$this->FIPS104,true);
		$criteria->compare('ISO2',$this->ISO2,true);
		$criteria->compare('ISO3',$this->ISO3,true);
		$criteria->compare('ISON',$this->ISON,true);
		$criteria->compare('Internet',$this->Internet,true);
		$criteria->compare('Capital',$this->Capital,true);
		$criteria->compare('MapReference',$this->MapReference,true);
		$criteria->compare('NationalitySingular',$this->NationalitySingular,true);
		$criteria->compare('NationalityPlural',$this->NationalityPlural,true);
		$criteria->compare('Currency',$this->Currency,true);
		$criteria->compare('CurrencyCode',$this->CurrencyCode,true);
		$criteria->compare('Population',$this->Population,true);
		$criteria->compare('Title',$this->Title,true);
		$criteria->compare('Comment',$this->Comment,true);
		$criteria->compare('is_paypal',$this->is_paypal);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'pagination' => array(  'pageSize'=>Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']),
            ),
		));
	}
}