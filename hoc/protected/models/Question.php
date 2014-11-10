<?php

/**
 * This is the model class for table "question".
 *
 * The followings are the available columns in table 'question':
 * @property integer $id
 * @property string $question
 * @property integer $user_id
 * @property integer $default
 */
class Question extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Question the static model class
	 */
    const DEFAULT_QUESTION = 0;
    const UESR_QUESTION = 1;
    public $username;
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'question';
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
			array('question', 'required'),
			array('user_id, default', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, question, user_id, default', 'safe', 'on'=>'search, questionuser'),
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
            'user' => array(self::BELONGS_TO, 'User', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('global', 'ID'),
			'question' => Yii::t('global', 'Question'),
			'user_id' => Yii::t('global', 'User'),
			'default' => Yii::t('global', 'Default'),
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
		$criteria->compare('question',$this->question,true);
		$criteria->compare('user_id',$this->user_id, true);
		$criteria->compare('default',$this->default, true);
        //$criteria->condition = "user_id = ". self::DEFAULT_QUESTION;
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'pagination' => array(  'pageSize'=>Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']),
            ),
		));
	}
    
    public function getIdOfQuestion($id){
        $sql = "SELECT * FROM question WHERE user_id = ". $id ." OR 
        user_id = 0 ORDER BY question.default DESC";        
        $result = Question::model()->findAllBySql($sql);
        $arr = array();
        foreach ($result as $key => $item) {
			$arr[]=$item['id'];
		}
		return $arr;
    }
    
    public function getQuestion($id){
        $result = Question::model()->find(array(
            'select'=>'question',
            'condition'=>'id=:id',
            'params'=>array(':id'=>$id)
        ));
        return $result['question'];
    }
    
    public function checkQuestion($id){
        $result = Question::model()->find(array(
            'select'=>'*',
            'condition'=>'id=:id',
            'params'=>array(':id'=>$id)
        ));
        return $result['default'];
    }
    
    public function questionuser()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
		$criteria->compare('id',$this->id);
		$criteria->compare('question',$this->question,true);
		$criteria->compare('user_id',$this->user_id, true);
        $criteria->compare('t.default', 0);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}        
}