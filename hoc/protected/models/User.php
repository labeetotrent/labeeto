<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $id
 * @property string $username
 * @property integer $gender
 * @property string $career
 * @property string $email
 * @property string $password
 * @property integer $joined
 * @property string $role
 * @property string $ehtnicity
 * @property string $fname
 * @property string $lname
 * @property string $birthday
 * @property string $photo
 * @property string $address
 * @property string $education
 * @property string $religion
 * @property string $height
 * @property string $excercise
 * @property string $passion
 * @property string $goal
 * @property string $smoke
 * @property string $relations
 * @property string $zipcode
 * @property string $latitude
 * @property string $longtitude
 * @property string $drink
 * @property integer $status
 * @property string $last_logged
 * @property string $created
 * @property string $updated
 * @property string $verify_profile
 * @property integer $is_online
 * @property integer $membership
 * @property integer $verified
 *
 * The followings are the available model relations:
 * @property Achievements[] $achievements
 */
class User extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
    const STATUS_ACTIVE     = 0;
    const STATUS_INACTIVE   = 1;
    const STATUS_UNVERIFIED = 2;
    const STATUS_SUSPENDED  = 3;
    const STATUS_REPORTED   = 4;
    const STATUS_PREMIUM    = 5;
    const WAIT_VERIFY       = 1;
    const VERIFIED          = 2;
    const NO_VERIFY         = 0;
    const USER_ONLINE       = 1;
    const USER_OFFLINE      = 0;
    const GENDER_MALE       = 0;
    const GENDER_FEMALE     = 1;
    const NEW_VERIFIED      = 1;

    const MEMBER_FREE=0;
    const MEMBER_VERIFIED=1;
    const MEMBER_PERSONALTRAINER=2;
    const MEMBER_PREMIUM=3;
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'users';
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
            array('username','required'),
			array('gender, joined, status, is_online,membership, verified', 'numerical', 'integerOnly'=>true),
			array('username, email, photo, address, gender_look', 'length', 'max'=>155),
			array('career, height, smoke', 'length', 'max'=>100),
			array('password, fname, lname, education, religion', 'length', 'max'=>40),
			array('role, ehtnicity', 'length', 'max'=>30),
			array('excercise, passion, goal, relations, drink', 'length', 'max'=>255),
			array('zipcode', 'length', 'max'=>5),
			array('latitude, longtitude', 'length', 'max'=>50),
			array('birthday, last_logged', 'safe'),
            array('email', 'uniqueEmail','on'=>'create'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, username, gender, career, email, password, joined, role, ehtnicity, fname, lname, birthday, photo, address, education, religion, height, excercise, passion, goal, smoke, relations, zipcode, latitude, longtitude, gender_look, drink, status, last_logged, , created, updated, is_online, verified', 'safe', 'on'=>'search'),
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
            'achievements' => array(self::HAS_MANY, 'Achievements', 'user_id'),
            'reportuser' => array(self::HAS_MANY, 'ReportUser', 'user_id'),
            'question' => array(self::HAS_MANY, 'Question', 'user_id'),
            'photo' => array(self::HAS_MANY, 'Photo', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('global', 'ID'),
			'username' => Yii::t('global', 'Username'),
			'gender' => Yii::t('global', 'Gender'),
			'career' => Yii::t('global', 'Career'),
			'email' => Yii::t('global', 'Email'),
			'password' => Yii::t('global', 'Password'),
			'joined' => Yii::t('global', 'Joined'),
			'role' => Yii::t('global', 'Role'),
			'ehtnicity' => Yii::t('global', 'Ehtnicity'),
			'fname' => Yii::t('global', 'Fname'),
			'lname' => Yii::t('global', 'Lname'),
			'birthday' => Yii::t('global', 'Birthday'),
			'photo' => Yii::t('global', 'Photo'),
			'address' => Yii::t('global', 'Address'),
			'education' => Yii::t('global', 'Education'),
			'religion' => Yii::t('global', 'Religion'),
			'height' => Yii::t('global', 'Height'),
			'excercise' => Yii::t('global', 'Excercise'),
			'passion' => Yii::t('global', 'Passion'),
			'goal' => Yii::t('global', 'Goal'),
			'smoke' => Yii::t('global', 'Smoke'),
			'relations' => Yii::t('global', 'Relations'),
			'zipcode' => Yii::t('global', 'Zipcode'),
			'latitude' => Yii::t('global', 'Latitude'),
			'longtitude' => Yii::t('global', 'Longtitude'),
			'drink' => Yii::t('global', 'Drink'),
			'status' => Yii::t('global', 'Status'),
			'last_logged' => Yii::t('global', 'Last Logged'),
            'created' => Yii::t('global', 'Created'),
            'updated' => Yii::t('global', 'Updated'),
            'is_online' => Yii::t('global', 'Status'),
            'membership' => Yii::t('global', 'Membership'),
            'verified' => Yii::t('global', 'Verified'),
            'gender_look' => Yii::t('global', 'Gender Looking'),
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
		$criteria->compare('username',$this->username,true);
		$criteria->compare('gender',$this->gender);
		$criteria->compare('career',$this->career,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('joined',$this->joined);
		$criteria->compare('role',$this->role,true);
		$criteria->compare('ehtnicity',$this->ehtnicity,true);
		$criteria->compare('fname',$this->fname,true);
		$criteria->compare('lname',$this->lname,true);
        if ($this->birthday)
            $criteria->compare('t.birthday', date('Y-m-d ', $this->birthday), true);
		$criteria->compare('photo',$this->photo,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('education',$this->education,true);
		$criteria->compare('religion',$this->religion,true);
		$criteria->compare('height',$this->height,true);
		$criteria->compare('excercise',$this->excercise,true);
		$criteria->compare('passion',$this->passion,true);
		$criteria->compare('goal',$this->goal,true);
		$criteria->compare('smoke',$this->smoke,true);
		$criteria->compare('relations',$this->relations,true);
		$criteria->compare('zipcode',$this->zipcode,true);
		$criteria->compare('latitude',$this->latitude,true);
		$criteria->compare('longtitude',$this->longtitude,true);
		$criteria->compare('drink',$this->drink,true);
		$criteria->compare('status',$this->status);
        if ($this->last_logged)
            $criteria->compare('t.last_logged', date('Y-m-d ', strtotime($this->last_logged)), true);
        if ($this->created)
            $criteria->compare('t.created', date('Y-m-d ', strtotime($this->created)), true);
        $criteria->compare('updated',$this->updated,true);
        $criteria->compare('is_online',$this->is_online);
        $criteria->compare('membership',$this->membership);
        $criteria->compare('verified',$this->verified);
        $criteria->compare('gender_look',$this->gender_look);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'sort'=>array(
                'defaultOrder'=>'t.id DESC',
            ),
            'pagination' => array( 'pageSize'=>Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']),
            ),
		));
	}

    public function hashPassword( $password )
    {
        return md5(sha1($password));
    }
    public function uniqueEmail($attribute, $params)
    {
        if($user = User::model()->exists('email=:email',array('email'=>$this->email)))
            $this->addError($attribute, 'Email already exists!');
    }
    
    /*public function generatePassword($minLength=5, $maxLength=10)
    {
        $length=rand($minLength,$maxLength);

        $letters='bcdfghjklmnpqrstvwxyz';
        $vowels='aeiou';
        $code='';
        for($i=0;$i<$length;++$i)
        {
            if($i%2 && rand(0,10)>2 || !($i%2) && rand(0,10)>9)
                $code.=$vowels[rand(0,4)];
            else
                $code.=$letters[rand(0,20)];
        }

        return $code;
    }*/

    function generatePassword($length = 8) {
        $str = "";
        $characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));
        $max = count($characters) - 1;
        for ($i = 0; $i < $length; $i++) {
            $rand = mt_rand(0, $max);
            $str .= $characters[$rand];
        }
        return $str;
    }
    function getActiveMember(){
        $active_member = array(
            Yii::t('global','Active'),
            Yii::t('global','Inactive')
        );
        return $active_member;
    }

    function getStatusMember($status){
        if($status==self::STATUS_ACTIVE)
            $sta = Yii::t('global','Active');
        else if( $status == self::STATUS_INACTIVE )
            $sta = Yii::t('global','Inactive');
        else if( $status == self::STATUS_UNVERIFIED )
            $sta = Yii::t('global','Unverified');
        else if( $status == self::STATUS_SUSPENDED )
            $sta = Yii::t('global','Suspended');
        else if( $status == self::STATUS_REPORTED )
            $sta = Yii::t('global','Reported');
        else if( $status == self::STATUS_PREMIUM )
            $sta =Yii::t('global','Premium');
        return $sta;
    }

    function getMembership($member){
        if($member==self::MEMBER_FREE)
            $sta = Yii::t('global','Free');
        else if( $member == self::MEMBER_VERIFIED )
            $sta = Yii::t('global','Verified');
        else if( $member == self::MEMBER_PERSONALTRAINER )
            $sta = Yii::t('global','Personal Trainer');
        else if( $member == self::MEMBER_PREMIUM )
            $sta = Yii::t('global','Premium');
        return $sta;
    }

    function showAdminImage(){
        $image = ( $this->photo != 'undefined' )?$this->photo:'no_image.png';
            return '<a class="fancybox" href="/uploads/avatar/'.$image.'" rel="group">
						<img class="img-polaroid fix_image_products" src="/uploads/avatar/'.$image.'" style="height: 40px;"/>
					</a>';


    }

    function showAdminImageNew( $image ){
        $image = ( $image != 'undefined' )?$image:'no_image.png';
            return '<a class="fancybox" href="/uploads/avatar/'.$image.'" rel="group">
					<img class="img-polaroid fix_image_products" src="/uploads/avatar/'.$image.'" style="height: 40px;"/>
				</a>';

    }

    public function getEmails($id){
        $result = User::model()->find(array(
                'select'=>'email',
                'condition'=>'id=:id',
                'params'=>array( ':id'=>$id ) )
        );

        return  $result['email'];
    }

    public function getUser($id){
        $result = User::model()->find(array(
                'select'=>'username',
                'condition'=>'id=:id',
                'params'=>array( ':id'=>$id ) )
        );

        return  $result['username'];
    }
    
    public function showAvatar($id){
        $result = User::model()->find(array(
                'select'=>'photo',
                'condition'=>'id=:id',
                'params'=>array( ':id'=>$id ) )
        );
        if($result)
            return  $result['photo'];
        else
            return 'no_image.png';
    }
    
    public function getIdOfUser(){
        $result = self::model()->findAll();
        $arr = array();
        foreach($result as $value){
            if($value->role != 'admin'){
                $arr[] = $value->id;
            }
        }
        return $arr;
    }
    
    public function getAllUser(){
        $result = self::model()->findAll();
        $arr = array();
        foreach($result as $value){
            if($value->role != 'admin'){
                $arr[$value['id']] = $value['username'];
            }
        }
        return $arr;
    }
    
    function getVideo($url){
        $image_url = parse_url($url);
        $result = '';
        if (isset($image_url ) ){
            if($image_url['host'] == 'www.youtube.com' || $image_url['host'] == 'youtube.com'){
                $videoUrl = "http://www.youtube.com/oembed?url=" . $url. "&format=json";
                $object = self::getObjectVideo($videoUrl);
                $video = json_decode($object, true);
                $result =  $video['html'];
            }
            else if($image_url['host'] == 'www.vimeo.com' || $image_url['host'] == 'vimeo.com'){
                $oembed_endpoint = 'http://vimeo.com/api/oembed';
                $xml_url = $oembed_endpoint . '.xml?url=' . rawurlencode($url) . '&width=640';
                $oembed = simplexml_load_string(self::getObjectVideo($xml_url));
                $result = html_entity_decode($oembed->html);
            } else {
                $result='<div id="content" class="jwplayer novideo" style="margin: 0px auto">'/*.Yii::t('global','No video')*/.'</div>';
                $result.="<script type='text/javascript'>";
                $result.='jwplayer("content").setup({';
                $result.='volume: "100", menu: "true", allowscriptaccess: "always", wmode: "opaque",';
                $result.='file: "/uploads/media/'.$url.'",';
                $result.='width: "100%", height: "257", skin: "/uploads/video/six.xml", });</script>';
            }
        }
        return $result;
    }

    function updateStatusOnline(){
        $table_members = $this->tableName();
        Yii::app()->db->createCommand()
            ->update($table_members,
                array( 'last_logged'=> new CDbExpression('NOW()'), 'is_online' => User::USER_ONLINE ),
                'id=:id', array( ':id'=>Yii::app()->user->id )
            );
        /*$sql = " SELECT username FROM users WHERE last_logged > NOW()-60 AND id ='".Yii::app()->user->id."' ";
        $res = Yii::app()->db->createCommand($sql)->queryAll();
        foreach ( $res as $result ){
            $username = $result['username'];
        }
        if( $username == '' ){
            $user = User::model()->findByPk(Yii::app()->user->id);
            $user->is_online = User::USER_OFFLINE;
            $user->save();
        }*/
    }

    function checkStatusUserOnline( $user_id ){
        $sql = " SELECT username FROM users WHERE last_logged > NOW()-60 AND id ='$user_id' ";
        $res = Yii::app()->db->createCommand($sql)->queryAll();
        foreach ( $res as $result ){
            $username = $result['username'];
        }
        error_reporting(0);
        if( $username != '' ){
            $user = User::model()->findByPk($user_id);
            $user->is_online = User::USER_ONLINE;
            $user->save();
            $sta = Yii::t('global', 'Online');
        }
        else{
            $user = User::model()->findByPk($user_id);
            $user->is_online = User::USER_OFFLINE;
            $user->save();
            $sta = Yii::t('global', 'Offline');
        }
        return $sta;
    }

    function checkUserOnlineNew(){
        $sta = Yii::t('global', 'Offline');
        if( $this->is_online == User::USER_ONLINE )
            $sta = Yii::t('global', 'Online');
        return $sta;
    }

    function checkGenderUser(){
        $sta = Yii::t('global', 'Male');
        if( $this->gender == User::GENDER_FEMALE )
            $sta = Yii::t('global', 'Female');
        return $sta;
    }

    function checkVerifiedUser(){
        $sta = Yii::t('global', 'No');
        if( $this->verified == User::NEW_VERIFIED )
            $sta = Yii::t('global', 'Yes');
        return $sta;
    }

    function checkVerifiedUserNew( $verified ){
        $sta = Yii::t('global', 'No');
        if( $verified == User::NEW_VERIFIED )
            $sta = Yii::t('global', 'Yes');
        return $sta;
    }

    public function getSuspendedUser(){
        $result = self::model()->findAllByAttributes(array('status'=>User::STATUS_SUSPENDED));
        $arr = array();
        if($result){
            foreach($result as $value){
                $arr[] = $value->id;
            }
            return implode(", ",$arr);
        }else{
            return 0;
        }
    }

    public function getNameUser( $id ){
        $user = User::model()->findByPk($id);
        return "<a href='/admin/members/view?id=".$id."'>".$user->username."</a>";

    }

}