<?php

/**
 * This is the model class for table "custompages".
 *
 * The followings are the available columns in table 'custompages':
 * @property integer $id
 * @property string $title
 * @property string $alias
 * @property string $content
 * @property integer $dateposted
 * @property integer $authorid
 * @property integer $last_edited_date
 * @property integer $last_edited_author
 * @property string $tags
 * @property string $language
 * @property string $metadesc
 * @property string $metakeys
 * @property string $visible
 * @property integer $status
 */
class Custompages extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Custompages the static model class
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
		return 'custompages';
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
            array('title, alias, content', 'required' ),
            array('alias', 'CheckUniqueAlias'),
            array('title, alias', 'length', 'min' => 3, 'max' => 55 ),
            array('alias', 'match', 'allowEmpty'=>false, 'pattern'=>'/^[A-Za-z0-9_-]+$/'),
			array('dateposted, authorid, last_edited_date, last_edited_author, status', 'numerical', 'integerOnly'=>true),
			array('title, alias, tags, metadesc, metakeys', 'length', 'max'=>255),
			array('language', 'length', 'max'=>3),
			array('content, visible', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, alias, content, dateposted, authorid, last_edited_date, last_edited_author, tags, language, metadesc, metakeys, visible, status', 'safe', 'on'=>'search'),
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
     * Before save operations
     */
    public function beforeSave()
    {
        if( $this->isNewRecord )
        {
            $this->dateposted = time();
            $this->authorid = Yii::app()->user->id;
        }
        else
        {
            $this->last_edited_date = time();
            $this->last_edited_author = Yii::app()->user->id;
        }

        // Fix the language, tags and visibility
        $this->visible = ( is_array( $this->visible ) && count( $this->visible ) ) ? implode(',', $this->visible) : $this->visible;
        $this->language = ( is_array( $this->language ) && count( $this->language ) ) ? implode(',', $this->language) : $this->language;

        // Alias
        $this->alias = str_replace(' ', '-', $this->alias);
        $this->status = 1;
        return parent::beforeSave();
    }

    /**
     * Check alias and language combination
     */
    public function CheckUniqueAlias()
    {
        if( $this->isNewRecord )
        {
            // Check if we already have an alias with those parameters
            if( self::model()->exists('alias=:alias AND language = :lang', array(':alias' => $this->alias, ':lang' => $this->language ) ) )
            {
                $this->addError('alias', Yii::t('custompages', 'There is already a page with that alias and language combination.'));
            }
        }
        else
        {
            // Check if we already have an alias with those parameters
            if( self::model()->exists('alias=:alias AND language = :lang AND id!=:id', array( ':id' => $this->id, ':alias' => $this->alias, ':lang' => $this->language ) ) )
            {
                $this->addError('alias', Yii::t('custompages', 'There is already a page with that alias and language combination.'));
            }
        }
    }

    /**
     * Before validate operations
     */
    public function beforeValidate()
    {
        if (trim($this->alias) == '')
            $this->alias = self::model()->getAlias( $this->title );

        return parent::beforeValidate();
    }
    public function afterDelete()
    {
        self::model()->deleteAll("alias = '{$this->alias}'");
        return parent::afterDelete();
    }
    public function getAlias( $alias=null )
    {
        return Yii::app()->func->makeAlias( $alias !== null ? $alias : $this->alias );
    }

    /**
     * after save method
     */
    public function afterSave()
    {
        Yii::app()->urlManager->clearCache();

        return parent::afterSave();
    }

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('global', 'ID'),
			'title' => Yii::t('global', 'Title'),
			'alias' => Yii::t('global', 'Alias'),
			'content' => Yii::t('global', 'Content'),
			'dateposted' => Yii::t('global', 'Dateposted'),
			'authorid' => Yii::t('global', 'Authorid'),
			'last_edited_date' => Yii::t('global', 'Last Edited Date'),
			'last_edited_author' => Yii::t('global', 'Last Edited Author'),
			'tags' => Yii::t('global', 'Tags'),
			'language' => Yii::t('global', 'Language'),
			'metadesc' => Yii::t('global', 'Metadesc'),
			'metakeys' => Yii::t('global', 'Metakeys'),
			'visible' => Yii::t('global', 'Visible'),
			'status' => Yii::t('global', 'Status'),
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('alias',$this->alias,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('dateposted',$this->dateposted);
		$criteria->compare('authorid',$this->authorid);
		$criteria->compare('last_edited_date',$this->last_edited_date);
		$criteria->compare('last_edited_author',$this->last_edited_author);
		$criteria->compare('tags',$this->tags,true);
		$criteria->compare('language',Yii::app()->language,true);
		$criteria->compare('metadesc',$this->metadesc,true);
		$criteria->compare('metakeys',$this->metakeys,true);
		$criteria->compare('visible',$this->visible,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'sort'=>array(
                'defaultOrder'=>'id DESC',
            ),
            'pagination' => array(  'pageSize'=>Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']),
            ),
		));
	}

    function languageButton($lang){
        $model = self::model()->findByAttributes(array(
            'alias' => $this->alias,
            'language' => $lang
        ));
        if ($model){
            return '<a href="'.Yii::app()->createUrl('admin/custompages/update', array('id' => $model->id)).'" class="tipb" data-original-title="'.Yii::t('global', 'Edit').'">
                <span class="label green" ><i class="icon-pencil edit" title="'.Yii::t('adminlang', 'Edit').'"></i></span>
            </a><a href="'.Yii::app()->createUrl('admin/custompages/view', array('id' => $model->id)).'" class="tipb" data-original-title="'.Yii::t('global', 'View').'">
                <span class="label cyan" ><i class="icon-info-sign info" title="'.Yii::t('adminlang', 'View').'"></i></span>
            </a>';
        }
        else{
            return '<a href="'.Yii::app()->createUrl('admin/custompages/create', array('alias' => $this->alias, 'language'=> $lang)).'" class="tipb" data-original-title="'.Yii::t('global', 'Add').'">
                <span class="label cyan" ><i class="icon-plus"></i></span>
            </a>';
        }
    }

}