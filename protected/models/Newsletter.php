<?php

/**
 * This is the model class for table "newsletter".
 *
 * The followings are the available columns in table 'newsletter':
 * @property integer $id
 * @property string $email
 * @property integer $joined
 * @property integer $user_id
 * @property string $created
 * @property string $updated
 */
class Newsletter extends CActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Newsletter the static model class
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
        return 'newsletter';
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
        	array('email', 'required'),
            array('email', 'email'),
            array('joined, user_id', 'numerical', 'integerOnly'=>true),
            array('email', 'length', 'max'=>125),
            array('created, updated', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, email, joined, user_id, created, updated', 'safe', 'on'=>'search'),
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
            'email' => Yii::t('global', 'Email'),
            'joined' => Yii::t('global', 'Joined'),
            'user_id' => Yii::t('global', 'User'),
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
        $criteria->compare('email',$this->email,true);
        $criteria->compare('joined',$this->joined);
        $criteria->compare('user_id',$this->user_id);
        $criteria->compare('created',$this->created,true);
        $criteria->compare('updated',$this->updated,true);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
            'sort'=>array(
                'defaultOrder'=>'t.id DESC',
            ),
        ));
    }
}