<?php

/**
 * This is the model class for table "verify_profile".
 *
 * The followings are the available columns in table 'verify_profile':
 * @property integer $id
 * @property string $photo
 * @property integer $user_id
 * @property string $date
 * @property string $code
 */
class VerifyProfile extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return VerifyProfile the static model class
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
		return 'verify_profile';
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
			array('user_id', 'numerical', 'integerOnly'=>true),
			array('photo', 'length', 'max'=>500),
			array('code', 'length', 'max'=>10),
			array('date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, photo, user_id, date, code, is_approval', 'safe', 'on'=>'search'),
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
			'photo' => Yii::t('global', 'Photo'),
			'user_id' => Yii::t('global', 'User'),
			'date' => Yii::t('global', 'Date'),
			'code' => Yii::t('global', 'Code'),
            'is_approval' => Yii::t('global', "Approval"),
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
		$criteria->compare('user_id',$this->user_id);
		//$criteria->compare('date',$this->date,true);
		$criteria->compare('code',$this->code,true);
        $criteria->compare('is_approval',$this->is_approval);
        if ($this->date)
            $criteria->compare('date', date('Y-m-d ', strtotime($this->date)), true);
            
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'pagination' => array(  'pageSize'=>Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']),
            ),
		));
	}
    
    public function getApproval($is_approval){
        if($is_approval == 1)
            return Yii::t('global', 'Approval');
        return Yii::t('global', 'No Approval');
    } 
    function showAdminPhoto()
    {
        return '<a class="fancybox" href="/uploads/photoVerify/' . $this->photo . '" rel="group">
                    <img class="img-polaroid fix_image_products" src="/uploads/photoVerify/' . $this->photo . '" style="height: 40px;"/>
                </a>';
    }
    
    public function getApprovalStatus(){
        $approval = array(
              Yii::t('global','No Approval'),
              Yii::t('global','Approval')
            );
        return $approval;
    }
    
    public function getLinkUser($id){
        $user = User::model()->getUser($id);
        return '<label><a href="/admin/user/view?id='. $id .'&action=index">'. $user .'</a></label>';
    }
}