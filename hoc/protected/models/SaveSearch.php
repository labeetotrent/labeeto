<?php

/**
 * This is the model class for table "save_search".
 *
 * The followings are the available columns in table 'save_search':
 * @property integer $id
 * @property integer $user_id
 * @property string $username
 * @property integer $gender
 * @property integer $age_from
 * @property integer $age_to
 * @property double $within_from
 * @property double $within_to
 * @property double $height_from
 * @property double $height_to
 * @property string $education
 * @property string $ehtnicity
 * @property string $religion
 * @property integer $children
 * @property string $excercise
 * @property string $drink
 * @property string $smoke
 * @property integer $is_online
 * @property integer $verified
 * @property string $created
 * @property string $updated
 *
 * The followings are the available model relations:
 * @property Users $user
 */
class SaveSearch extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SaveSearch the static model class
	 */
	const GENDER_MALE       = 0;
    const GENDER_FEMALE     = 1;
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'save_search';
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
			//array('created, updated', 'required'),
			array('user_id, gender, age_from, age_to, children, is_online, verified', 'numerical', 'integerOnly'=>true),
			array('within_from, within_to, height_from, height_to', 'numerical'),
			array('username', 'length', 'max'=>155),
			array('education, religion', 'length', 'max'=>40),
			array('ehtnicity', 'length', 'max'=>30),
			array('excercise, drink', 'length', 'max'=>255),
			array('smoke', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, username, gender, age_from, age_to, within_from, within_to, height_from, height_to, education, ehtnicity, religion, children, excercise, drink, smoke, is_online, verified, created, updated', 'safe', 'on'=>'search'),
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
			'user' => array(self::BELONGS_TO, 'Users', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('global', 'ID'),
			'user_id' => Yii::t('global', 'User'),
			'username' => Yii::t('global', 'Username'),
			'gender' => Yii::t('global', 'Gender'),
			'age_from' => Yii::t('global', 'Age From'),
			'age_to' => Yii::t('global', 'Age To'),
			'within_from' => Yii::t('global', 'Within From'),
			'within_to' => Yii::t('global', 'Within To'),
			'height_from' => Yii::t('global', 'Height From'),
			'height_to' => Yii::t('global', 'Height To'),
			'education' => Yii::t('global', 'Education'),
			'ehtnicity' => Yii::t('global', 'Ehtnicity'),
			'religion' => Yii::t('global', 'Religion'),
			'children' => Yii::t('global', 'Children'),
			'excercise' => Yii::t('global', 'Excercise'),
			'drink' => Yii::t('global', 'Drink'),
			'smoke' => Yii::t('global', 'Smoke'),
			'is_online' => Yii::t('global', 'Is Online'),
			'verified' => Yii::t('global', 'Verified'),
			'created' => Yii::t('global', 'Created'),
			'updated' => Yii::t('global', 'Updated'),
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
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('gender',$this->gender);
		$criteria->compare('age_from',$this->age_from);
		$criteria->compare('age_to',$this->age_to);
		$criteria->compare('within_from',$this->within_from);
		$criteria->compare('within_to',$this->within_to);
		$criteria->compare('height_from',$this->height_from);
		$criteria->compare('height_to',$this->height_to);
		$criteria->compare('education',$this->education,true);
		$criteria->compare('ehtnicity',$this->ehtnicity,true);
		$criteria->compare('religion',$this->religion,true);
		$criteria->compare('children',$this->children);
		$criteria->compare('excercise',$this->excercise,true);
		$criteria->compare('drink',$this->drink,true);
		$criteria->compare('smoke',$this->smoke,true);
		$criteria->compare('is_online',$this->is_online);
		$criteria->compare('verified',$this->verified);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('updated',$this->updated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function getUser($id){
        $result = User::model()->find(array(
                'select'=>'username',
                'condition'=>'id=:id',
                'params'=>array( ':id'=>$id ) )
        );

        return  $result['username'];
    }
    public function getEducation($id){
        $result = Education::model()->find(array(
                'select'=>'name',
                'condition'=>'id=:id',
                'params'=>array( ':id'=>$id ) )
        );

        return  $result['name'];
    }
    public function getEthnicty($id){
        $result = Ethnicity::model()->find(array(
                'select'=>'name',
                'condition'=>'id=:id',
                'params'=>array( ':id'=>$id ) )
        );

        return  $result['name'];
    }

    function checkGenderUser(){
        $sta = Yii::t('global', 'Male');
        if( $this->gender == User::GENDER_FEMALE )
            $sta = Yii::t('global', 'Female');
        return $sta;
    }
}