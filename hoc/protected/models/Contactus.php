<?php

/**
 * This is the model class for table "contactus".
 *
 * The followings are the available columns in table 'contactus':
 * @property integer $id
 * @property string $corporate_name
 * @property string $name
 * @property string $address
 * @property string $address1
 * @property string $zip
 * @property string $city
 * @property string $phone
 * @property string $fax
 * @property string $email
 * @property string $subject
 * @property string $content
 * @property integer $is_receive
 * @property integer $is_directory
 * @property integer $type
 * @property integer $sread
 * @property string $created
 * @property string $updated
 */
class Contactus extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Contactus the static model class
	 */
    const STATUS_READ =  1;
    public $verifyCode;
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'contactus';
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
            array('name, email', 'required'),
            array('email', 'email'),
            array('zip, phone, fax', 'numerical', 'integerOnly'=>true),
            array('phone, fax', 'match', 'pattern'=>'/^([+]?[0-9 ]+)$/'),
			array('sread,', 'numerical', 'integerOnly'=>true),
			array('corporate_name, name, address, address1, email, subject', 'length', 'max'=>255),
            array('zip, city, fax', 'length', 'max'=>150),
            array('phone', 'length', 'max'=>100),
			array('content, created, updated', 'safe'),
            array('verifyCode', 'captcha', 'on'=>'captchaRequired'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, corporate_name, name, address, address1, zip, city, phone, fax, email, subject, content, is_receive, is_directory, type, sread, created, updated', 'safe', 'on'=>'search'),
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
            'corporate_name' => Yii::t('global', 'Corporate Name'),
			'name' => Yii::t('global', 'Name'),
            'address' => Yii::t('global', 'Address'),
            'address1' => Yii::t('global', 'Address1'),
            'zip' => Yii::t('global', 'Zip'),
            'city' => Yii::t('global', 'City'),
            'phone' => Yii::t('global', 'Phone'),
            'fax' => Yii::t('global', 'Fax'),
			'email' => Yii::t('global', 'Email'),
			'subject' => Yii::t('global', 'Subject'),
			'content' => Yii::t('global', 'Content'),
            'is_receive' => Yii::t('global', 'Is Receive'),
            'is_directory' => Yii::t('global', 'Is Directory'),
            'type' => Yii::t('global', 'Type'),
			'sread' => Yii::t('global', 'Sread'),
			'created' => Yii::t('global', 'Created'),
			'updated' => Yii::t('global', 'Updated'),
			'verifyCode'=>'Please enter the captcha', // we have added this line
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
        $criteria->compare('corporate_name',$this->corporate_name,true);
		$criteria->compare('name',$this->name,true);
        $criteria->compare('address',$this->address,true);
        $criteria->compare('address1',$this->address1,true);
        $criteria->compare('zip',$this->zip,true);
        $criteria->compare('city',$this->city,true);
        $criteria->compare('phone',$this->phone,true);
        $criteria->compare('fax',$this->fax,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('subject',$this->subject,true);
		$criteria->compare('content',$this->content,true);
        $criteria->compare('is_receive',$this->is_receive);
        $criteria->compare('is_directory',$this->is_directory);
        $criteria->compare('type',$this->type);
		$criteria->compare('sread',$this->sread);
        if ($this->created)
            $criteria->compare('t.created', date('Y-m-d ', strtotime($this->created)), true);
		$criteria->compare('updated',$this->updated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'sort'=>array(
                'defaultOrder'=>'t.id DESC',
            ),
		));
	}

    function getActiveContact(){
        $active_contact = array(
            Yii::t('global','Unread'),
            Yii::t('global','Read')
        );
        return $active_contact;
    }

    function getStatus(){
        $status = Yii::t('global','Unread');
        if( $this->sread == self::STATUS_READ )
              $status = Yii::t('global','Read');
        return $status;
    }

    function getDataByStatus( $name ){
        if( $this->sread != self::STATUS_READ )
            $name = '<b>'.$name.'</b>';
        return $name;
    }
}