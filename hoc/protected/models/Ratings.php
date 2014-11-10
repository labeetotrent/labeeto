<?php

/**
 * This is the model class for table "ratings".
 *
 * The followings are the available columns in table 'ratings':
 * @property integer $id
 * @property double $score
 * @property integer $user_id
 * @property integer $type
 * @property string $created
 * @property string $updated
 * @property string $ip
 */
class Ratings extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Ratings the static model class
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
		return 'ratings';
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
			array('score, user_id, created, updated', 'required'),
			array('user_id', 'numerical', 'integerOnly'=>true),
			array('score', 'numerical'),
			array('ip', 'length', 'max'=>30),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, score, user_id, created, updated, ip', 'safe', 'on'=>'search'),
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
			'score' => Yii::t('global', 'Score'),
			'user_id' => Yii::t('global', 'User'),
			'type' => Yii::t('global', 'Type'),
			'created' => Yii::t('global', 'Created'),
			'updated' => Yii::t('global', 'Updated'),
			'ip' => Yii::t('global', 'Ip'),
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
		$criteria->compare('score',$this->score);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('type',$this->type);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('updated',$this->updated,true);
		$criteria->compare('ip',$this->ip,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'pagination' => array(  'pageSize'=>Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']),
            ),
		));
	}
    
    public function getRating( $user_id, $option = 0 ){
        $sql = 'SELECT COUNT(id) as id_count, SUM(score) as score_sum FROM ratings WHERE user_id='.$user_id;
        $allRating = Yii::app()->db->createCommand($sql)->queryAll();
        $scoreCurrent = 0;
        if($allRating){
            if($allRating[0]['id_count'] !=0){
                $scoreCurrent = $allRating[0]['score_sum'] / $allRating[0]['id_count'];
            } else{
                $scoreCurrent = 0 ;
            }
        }
        if( $option == 1 )
            echo $scoreCurrent;
        else 
            return $scoreCurrent;
    }
    
    public function totalRating( $user_id, $type = 0 ){
        $sql = "SELECT COUNT(id) AS totalrating FROM ratings WHERE user_id = ".$user_id;
        $totals = Yii::app()->db->createCommand($sql)->queryAll();
        foreach ($totals as $total){
            echo $total['totalrating'];
        }
    }
}