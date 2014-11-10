<?php

/**
 * This is the model class for table "photo".
 *
 * The followings are the available columns in table 'photo':
 * @property integer $id
 * @property string $photo
 * @property integer $is_public
 * @property integer $user_id
 * @property string $date
 *
 * The followings are the available model relations:
 * @property Users $user
 */
class Photo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Photo the static model class
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
		return 'photo';
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
			array('is_public, user_id, is_approval', 'numerical', 'integerOnly'=>true),
			array('photo', 'length', 'max'=>500),
			array('date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, photo, is_public, user_id, date, is_approval', 'safe', 'on'=>'search'),
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
			'photo' => Yii::t('global', 'Photo'),
			'is_public' => Yii::t('global', 'Is Public'),
            'is_approval' => Yii::t('global', 'Is Approval'),
			'user_id' => Yii::t('global', 'User'),
			'date' => Yii::t('global', 'Date'),
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
		$criteria->compare('photo',$this->photo,true);
		$criteria->compare('is_public',$this->is_public);
        $criteria->compare('is_approval',$this->is_approval);
		$criteria->compare('user_id',$this->user_id);
		//$criteria->compare('date',$this->date,true);
         if ($this->date)
            $criteria->compare('date', date('Y-m-d ', strtotime($this->date)), true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'sort'=>array(
                'defaultOrder'=>'id DESC',
                'attributes'=>array(
                    '*',
                ),
            ),
            'pagination' => array(  'pageSize'=>Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']),
            ),
		));
	}
    
    function showAdminPhoto()
    {
        return '<a class="fancybox" href="/uploads/photo/' . $this->photo . '" rel="group">
                    <img class="img-polaroid fix_image_products" src="/uploads/photo/' . $this->photo . '" style="height: 40px;"/>
                </a>';
    }
    
    public function getPublic($is_public){
        if($is_public == 1)
            return Yii::t('global', 'Public');
        return Yii::t('global', 'No Public');
        
    }
    
    public function getApproval($is_approval){
        if($is_approval == 1)
            return Yii::t('global', 'Approval');
        return Yii::t('global', 'No Approval');
    }
    
    public function getPublicStatus(){
        $public = array(
            Yii::t('global','No Public'),
              Yii::t('global','Public')
              
            );
        return $public;
    }
    
    public function getApprovalStatus(){
        $approval = array(
              Yii::t('global','No Approval'),
              Yii::t('global','Approval')
            );
        return $approval;
    }
}