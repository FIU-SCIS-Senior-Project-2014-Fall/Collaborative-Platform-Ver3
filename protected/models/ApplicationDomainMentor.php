<?php

/**
 * This is the model class for table "application_domain_mentor".
 *
 * The followings are the available columns in table 'application_domain_mentor':
 * @property string $id
 * @property string $user_id
 * @property string $status
 * @property string $date_created
 * @property integer $max_amount
 * @property integer $max_hours
 *
 * The followings are the available model relations:
 * @property User $user
 * @property ApplicationDomainMentorPick[] $applicationDomainMentorPicks
 * @property ApplicationRecommendedDomain[] $applicationRecommendedDomains
 * @property ApplicationSubdomainMentorPick[] $applicationSubdomainMentorPicks
 */
class ApplicationDomainMentor extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ApplicationDomainMentor the static model class
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
		return 'application_domain_mentor';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, max_amount, max_hours', 'required'),
			array('max_amount, max_hours', 'numerical', 'integerOnly'=>true),
			array('user_id', 'length', 'max'=>11),
			array('status', 'length', 'max'=>6),
			array('date_created', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, status, date_created, max_amount, max_hours', 'safe', 'on'=>'search'),
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
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
			'applicationDomainMentorPicks' => array(self::HAS_MANY, 'ApplicationDomainMentorPick', 'app_id'),
			'applicationRecommendedDomains' => array(self::HAS_MANY, 'ApplicationRecommendedDomain', 'appId'),
			'applicationSubdomainMentorPicks' => array(self::HAS_MANY, 'ApplicationSubdomainMentorPick', 'app_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'user_id' => 'User',
			'status' => 'Status',
			'date_created' => 'Date Created',
			'max_amount' => 'Max Amount',
			'max_hours' => 'Max Hours',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('date_created',$this->date_created,true);
		$criteria->compare('max_amount',$this->max_amount);
		$criteria->compare('max_hours',$this->max_hours);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}