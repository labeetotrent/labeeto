<?php

/**
 * This is the model class for table "role_permissions".
 *
 * The followings are the available columns in table 'role_permissions':
 * @property integer $id
 * @property integer $role_id
 * @property integer $per_id
 * @property string $created
 * @property string $updated
 */
class RolePermissions extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return RolePermissions the static model class
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
		return 'role_permissions';
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
			array('role_id, per_id', 'numerical', 'integerOnly'=>true),
			array('created, updated', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, role_id, per_id, created, updated', 'safe', 'on'=>'search'),
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
			'role_id' => Yii::t('global', 'Role'),
			'per_id' => Yii::t('global', 'Per'),
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
		$criteria->compare('role_id',$this->role_id);
		$criteria->compare('per_id',$this->per_id);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('updated',$this->updated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'pagination' => array(  'pageSize'=>Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']),
            ),
		));
	}

    public function getValue($per_id, $role_id){
        $rolePer = RolePermissions::model()->findByAttributes(array('per_id'=>$per_id, 'role_id'=>$role_id));
        return $rolePer['value'];
    }

    /*
     * Truncate Table
     */
    public function truncateTable()
    {
        Yii::app()->db->createCommand()->truncateTable($this->tableName());
    }

}