<?php

/**
 * This is the model class for table "answer".
 *
 * The followings are the available columns in table 'answer':
 * @property integer $id
 * @property string $answer
 * @property integer $question_id
 * @property integer $user_id
 */
class Answer extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Answer the static model class
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
		return 'answer';
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
			array('question_id, user_id', 'numerical', 'integerOnly'=>true),
			array('answer', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, answer, question_id, user_id', 'safe', 'on'=>'search'),
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
			'answer' => Yii::t('global', 'Answer'),
			'question_id' => Yii::t('global', 'Question'),
			'user_id' => Yii::t('global', 'User'),
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
		$criteria->compare('answer',$this->answer,true);
		$criteria->compare('question_id',$this->question_id);
		$criteria->compare('user_id',$this->user_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
    
    public function getAnswer($id){
        $arr = Question::model()->getIdOfQuestion($id);
        if($arr == NULL)
            return false;
        else{
            $sql = 'SELECT * FROM answer WHERE question_id IN ('. implode(", ",$arr). ') AND answer.user_id = '. $id ;
            $answer = Yii::app()->db->createCommand($sql)->queryAll();
            if($answer)
                return $answer;
            else
                return false;
        }
    }
    
    public function getIdOfAnswer(){
        $result = Answer::model()->findAllByAttributes(array('user_id'=>Yii::app()->user->id));
        $arr = array();
        foreach ($result as $key => $item) {
			$arr[]=$item['id'];
		}
		return $arr; 
    }
    
}