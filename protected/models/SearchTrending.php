<?php

/**
 * This is the model class for table "search_trending".
 *
 * The followings are the available columns in table 'search_trending':
 * @property integer $id
 * @property string $text
 * @property integer $count
 */
class SearchTrending extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SearchTrending the static model class
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
		return 'search_trending';
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
			array('text, count', 'required'),
			array('count', 'numerical', 'integerOnly'=>true),
			array('text', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, text, count', 'safe', 'on'=>'search'),
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
			'text' => Yii::t('global', 'Text'),
			'count' => Yii::t('global', 'Count'),
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
		$criteria->compare('text',$this->text,true);
		$criteria->compare('count',$this->count);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
    
    public function addNewCharacter($str){
        $check = self::model()->findByAttributes(array('text'=>$str));
        if($check){
            self::model()->updateByPk($check->id, array('count'=> $check->count + 1));
        }else{
            $search = new SearchTrending();
            $search->text = $str;
            $search->count = 1;
            $search->save();
        }
    }
    
    public function getTop5Search(){
        $sql = 'SELECT * FROM search_trending ORDER BY search_trending.count DESC LIMIT 5';
        return Yii::app()->db->createCommand($sql)->queryAll();
    }
}