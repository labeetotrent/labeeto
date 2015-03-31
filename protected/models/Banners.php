<?php

/**
 * This is the model class for table "banners".
 *
 * The followings are the available columns in table 'banners':
 * @property integer $id
 * @property string $name
 * @property string $position
 * @property integer $type
 * @property integer $is_active
 * @property string $filename
 * @property string $content
 * @property string $link
 * @property string $created
 * @property integer $is_login
 * @property integer $is_logout
 * @property integer $rank
 */
class Banners extends CActiveRecord
{
    const POSITION_TOP = 1;
    const POSITION_RIGHT = 2;
    const POSITION_TOP_RIGHT = 3;
    
    const TYPE_IMAGE = 1;
    const TYPE_FLASH = 2;
    const TYPE_CONTENT = 3;    
    
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Banners the static model class
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
		return 'banners';
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
			array('name, position, type', 'required'),
            array('filename', 'file','types'=>'jpg, gif, png, swf, flv, mp4', 'allowEmpty'=>true),
			array('type, is_active,is_login, is_logout', 'numerical', 'integerOnly'=>true),
			array('name, filename, link', 'length', 'max'=>512),
			array('position', 'length', 'max'=>32),
			array('content, created,is_login, is_logout,filename, rank', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, position, type, is_login, is_logout, is_active, filename, content, link, created', 'safe', 'on'=>'search'),
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
			'name' => Yii::t('global', 'Name'),
			'position' => Yii::t('global', 'Position'),
			'type' => Yii::t('global', 'Type'),
			'is_active' => Yii::t('global', 'Is Active'),
			'filename' => Yii::t('global', 'Filename'),
			'content' => Yii::t('banner', 'Content'),
			'link' => Yii::t('global', 'Link'),
			'created' => Yii::t('global', 'Created'),
            'is_login' => Yii::t('global', 'Is Login'),
            'is_logout' => Yii::t('global', 'Is Logout'),
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('position',$this->position,true);
		$criteria->compare('type',$this->type);
		$criteria->compare('is_active',$this->is_active);
		$criteria->compare('filename',$this->filename,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('link',$this->link,true);
        if ($this->created)
            $criteria->compare('t.created', date('Y-m-d ', strtotime($this->created)), true);
        $criteria->compare('is_login',$this->is_login);
        $criteria->compare('is_logout',$this->is_logout);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'sort'=>array(
                'defaultOrder'=>'t.id DESC',
            ),
            'pagination' => array(  'pageSize'=>Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']),
            ),
		));
	}
    
    public function show(){
        $html = '';
        if ($this->type == self::TYPE_CONTENT){
            echo $this->content;
        }
        else if ($this->type == self::TYPE_IMAGE){
            if ($this->link) $html .= '<a href="'.$this->link.'" target="_blank">';
            $html .= '<img src="/uploads/banner/'.$this->filename.'" />';
            if ($this->link) $html .= '</a>';
            
            echo $html;
        }
        else{
            $source = Yii::app()->basePath."/../uploads/banner/$this->filename";
            list($width, $height) = getimagesize($source);
            
            if ($this->link) $html .= '<a href="'.$this->link.'" target="_blank">';
            $html .= '
                <object width="'.$width.'" height="'.$height.'" classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000"
                    codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0">
                    <param name="src" value="/uploads/banner/'.$this->filename.'" />
                    <embed src="/uploads/banner/'.$this->filename.'" width="'.$width.'" height="'.$height.'" />
                </object>';
            if ($this->link) $html .= '</a>';
            
            echo $html;
        }
    }
    
    public function checkBannerMain( $position, $is_login='is_login' ){
        $banners = Banners::model()->findAllByAttributes(array('position' => $position, 'is_active' => 1, $is_login=>1),array('order' => 'rank' ));
        return $banners;
    }
    
    public static function showPosition($position, $box_class = 'right-box'){
        $banners = Banners::model()->findAllByAttributes(array('position' => $position, 'is_active' => 1,'is_login'=>1),array('order' => 'rank' ));
        foreach ($banners as $banner){
            if (!Yii::app()->user->isGuest && $banner->id == 3) continue;
            echo '<div class="'.$box_class.'">';
            $banner->show();
            echo '</div>';
        }
            
    }
    public static function showPositionGuest($position, $box_class = 'right-box'){
        $banners = Banners::model()->findAllByAttributes(array('position' => $position, 'is_active' => 1,'is_logout'=>1),array('order' => 'rank' ));
        foreach ($banners as $banner){
            if (!Yii::app()->user->isGuest && $banner->id == 3) continue;
            echo '<div class="'.$box_class.'">';
            $banner->show();
            echo '</div>';
        }

    }
    public function getStatus($isLogin){
        if($isLogin ==1){
            return "<input type='checkbox' checked disabled style='opacity: 1' />";
        }else {
            return "<input type='checkbox' disabled />";
        }
    }

    public  function getDataType( $type, $filename ){
       if ( $filename && ( $type == Banners::TYPE_IMAGE || $type == Banners::TYPE_FLASH)){
            $source = Yii::app()->basePath."/../uploads/banner/$filename";
            if (is_file($source)){
                if ($type == Banners::TYPE_IMAGE)
                   $rel= '<a class="fancybox" href="/uploads/banner/'.$filename.'" rel="group">
                        <img class="img-polaroid" src="/uploads/banner/'.$filename.'" style="height:50px" /></a>';
                else{
                    list($width, $height) = getimagesize($source);
                    if ($height > 100){
                        $scare = $height/100;
                        $height = ceil($height/$scare);
                        $width = ceil($width/$scare);
                    }
                    $rel = '<object width="500px" height="'.$height.'" classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000"
                            codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0">
                        <param name="src" value="/uploads/banner/'.$filename.'" />
                        <embed src="/uploads/banner/'.$filename.'" width="500px" height="'.$height.'" />
                    </object>';

                 }
            }
        }
        return $rel;
    }
    //tung add
    function getBannerPostion($position){
        return Banners::model()->findAllByAttributes(array('position'=>$position),array('order'=>'id DESC','limit'=> 1));
    }
    function renEmptyeBanner($position){
        $img = 'top-banner.jpg';
        if($position=='2') $img = 'z2.jpg';
        return '<a href="http://annuaire-audition.com"><img  src="/uploads/banner/'.$img.'" /></a>'; 
    }
    function renBannerImage($position,$file,$link){
        if($file=='')
            return $this->renEmptyeBanner($position);
        else{
            if($link!='')
                return '<a href="'.$link.'"><img  src="/uploads/banner/'.$file.'" /></a>';
            else
                return '<img  src="/uploads/banner/'.$file.'" />';
        }
    }
    function renBannerFlash($position,$file){
        if($file=='')
            return $this->renEmptyeBanner($position);
        else{
            if($position == '2'){
                $width = '728px';
                $height  = '90px';
            }
            else{
                $width = '370px';
                $height  = '340px';
            }
            return '<object width="'.$width.'" height="'.$height.'" classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000"
                        codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0">
                        <param name="src" value="/uploads/banner/'.$file.'" />
                        <embed src="/uploads/banner/'.$file.'" width="'.$width.'" height="'.$height.'" />
                    </object>';
        }        
    }
    function renBannerHtml($position,$content){
        if($content=='')
            return $this->renEmptyeBanner($position);
        else
            return $content;
    }
    function renBanner($position){

        $blockRents = $this->getBannerPostion($position);
        if($blockRents){
            foreach ($blockRents as $blockRent) {
                //set value
                $content    = $blockRent["content"];
                $type       = $blockRent["type"];
                $file       = $blockRent["filename"];
                $link       = $blockRent["link"];

                if($type == 1)//Image
                    $html = $this->renBannerImage($position,$file,$link);
                elseif($type == 2)//Flash
                    $html = $this->renBannerFlash($position,$file);                
                elseif($type == 3)//HTML code
                    $html = $this->renBannerHtml($position,$content);                
                else
                    $html = $this->renEmptyeBanner($position);
            }
            return $html;
        }
        else
            return null;
    }

}