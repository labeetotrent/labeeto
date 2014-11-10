<?php

/**
 * This is the model class for table "report_user".
 *
 * The followings are the available columns in table 'report_user':
 * @property integer $id
 * @property integer $user_id
 * @property integer $reported_user
 * @property integer $blocked_user
 * @property string $type_report
 * @property string $content
 * @property string $comment
 * @property string $created
 * @property string $updated
 */
class ReportUser extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ReportUser the static model class
	 */

	const STATUS_ACTIVE=0;
    const STATUS_INACTIVE=1;
    const STATUS_UNVERIFIED=2;
    const STATUS_SUSPENDED=3;
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'report_user';
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
			array('user_id, blocked_user, achievements_id', 'required'),
			array('user_id, reported_user, blocked_user, achievements_id', 'numerical', 'integerOnly'=>true),
            array('type_report', 'length', 'max'=>255),
            array('content, created, updated', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, reported_user, blocked_user, type_report, content,comment, created, updated, achievements_id', 'safe', 'on'=>'search'),
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
            'reported_user' => Yii::t('global', 'Reported User'),
            'blocked_user' => Yii::t('global', 'Blocked User'),
            'type_report' => Yii::t('global', 'Type Report'),
            'content' => Yii::t('global', 'Content'),
            'comment' => Yii::t('global', 'Comment'),
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
        $criteria->compare('reported_user',$this->reported_user);
        $criteria->compare('blocked_user',$this->blocked_user);
        $criteria->compare('type_report',$this->type_report,true);
        $criteria->compare('content',$this->content,true);
         $criteria->compare('comment',$this->comment,true);
        if ($this->created)
            $criteria->compare('t.created', date('Y-m-d ', strtotime($this->created)), true);
        $criteria->compare('updated',$this->updated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'sort'=>array(
                'defaultOrder'=>'t.id DESC',
            ),
            'pagination' => array(  'pageSize'=>Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']),
            ),
		));
	}
    
    public function getBlockedUser(){
        $result = self::model()->findAllByAttributes(array('user_id'=>Yii::app()->user->id));
        $arr = array();
        if($result){
            foreach($result as $value){
                $arr[] = $value->blocked_user;
            }
            return implode(", ",$arr);
        }else{
            return 0;
        }
    }

    public function getTypeReport($type){
        if($type==self::STATUS_ACTIVE)
            return Yii::t('global','Offensive Messaging');
        else if( $type == self::STATUS_INACTIVE )
            Yii::t('global','Offensive Profile');
        else if( $type== self::STATUS_UNVERIFIED )
            Yii::t('global','Offensive Image');
        else if($type == self::STATUS_SUSPENDED )
            Yii::t('global','Offensive Scamming');
        
    }

    public function getActiveProduct(){
        $active_product = array(
            'Offensive Messaging'   => Yii::t('global','Offensive Messaging'),
            'Offensive Profile'     => Yii::t('global','Offensive Profile'),
            'Offensive Image'       => Yii::t('global','Offensive Image'),
            'Offensive Scamming'    => Yii::t('global','Offensive Scamming'),
        
        );
        return $active_product;
    }
     public function getUser($id){
        $result = User::model()->find(array(
                'select'=>'username',
                'condition'=>'id=:id',
                'params'=>array( ':id'=>$id ) )
        );

        return  $result['username'];
    }

    public function getAirchivements($id){
        $result = Achievements::model()->find(array(
                'select'=>'name',
                'condition'=>'id=:id',
                'params'=>array( ':id'=>$id ) )
        );

        return  $result['name'];
    }

    public function getAchievementById( $id ){
        return "<a href='/admin/achievements/view?id=".$id."'>".$id."</a>";

    }

    public function showlink($id){
        return '<a href="/admin/reportUser/suspend?id='.$id.'" >Suppend</a>';
    }

}