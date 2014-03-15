<?php

/**
 * This is the model class for table "personal_meeting".
 *
 * The followings are the available columns in table 'personal_meeting':
 * @property integer $id
 * @property string $mentee_user_role_user_id
 * @property string $personal_mentor_user_role_user_id
 * @property string $date
 *
 * The followings are the available model relations:
 * @property Mentee $menteeUserRoleUser
 * @property PersonalMentor $personalMentorUserRoleUser
 */
class PersonalMeeting extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return PersonalMeeting the static model class
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
		return 'personal_meeting';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('mentee_user_role_user_id, personal_mentor_user_role_user_id', 'required'),
			array('mentee_user_role_user_id, personal_mentor_user_role_user_id', 'length', 'max'=>11),
			array('date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, mentee_user_role_user_id, personal_mentor_user_role_user_id, date', 'safe', 'on'=>'search'),
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
			'menteeUserRoleUser' => array(self::BELONGS_TO, 'Mentee', 'mentee_user_role_user_id'),
			'personalMentorUserRoleUser' => array(self::BELONGS_TO, 'PersonalMentor', 'personal_mentor_user_role_user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'mentee_user_role_user_id' => 'Mentee User Role User',
			'personal_mentor_user_role_user_id' => 'Personal Mentor User Role User',
			'date' => 'Date',
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
		$criteria->compare('mentee_user_role_user_id',$this->mentee_user_role_user_id,true);
		$criteria->compare('personal_mentor_user_role_user_id',$this->personal_mentor_user_role_user_id,true);
		$criteria->compare('date',$this->date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}