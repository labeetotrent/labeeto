<?php

/**
 * This is the model class for table "permissions".
 *
 * The followings are the available columns in table 'permissions':
 * @property integer $id
 * @property string $name
 * @property integer $parent_id
 * @property string $description
 * @property string $created
 * @property string $updated
 *
 * The followings are the available model relations:
 * @property Permissions $parent
 * @property Permissions[] $permissions
 */
class Permissions extends CActiveRecord
{
	const STATUS_ACTIVE = 1;
    /**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Permissions the static model class
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
		return 'permissions';
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
            array('name', 'required'),
			array('parent_id', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>255),
			array('description, created, updated', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, parent_id, description, created, updated', 'safe', 'on'=>'search'),
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
			'parent' => array(self::BELONGS_TO, 'Permissions', 'parent_id'),
			'permissions' => array(self::HAS_MANY, 'Permissions', 'parent_id'),
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
			'parent_id' => Yii::t('global', 'Parent'),
            'parent.name' => Yii::t('global', 'Parent'),
			'description' => Yii::t('global', 'Description'),
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('parent_id',$this->parent_id);
		$criteria->compare('description',$this->description,true);
        if ($this->created)
            $criteria->compare('t.created', date('Y-m-d ', strtotime($this->created)), true);
		$criteria->compare('updated',$this->updated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'sort'=>array(
                'defaultOrder'=>'t.id DESC',
                'attributes'=>array(
                    'parent.name'=>array(
                        'asc'=>'parent_id',
                        'desc'=>'parent_id DESC',
                    ),
                    '*'),
            ),
            'pagination' => array(  'pageSize'=>Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']),
            ),
		));
	}

    public function getPermissionsUser(){
        $sql = " SELECT permissions.name, role_id, per_id, role_permissions.value
                 FROM permissions
                 LEFT JOIN role_permissions
                 ON permissions.id = role_permissions.per_id
                 GROUP BY permissions.name
                 ORDER BY permissions.id, role_id";
        return Yii::app()->db->createCommand($sql)->queryAll();
    }
}