<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Student".
 *
 * @property int $ID
 * @property string $Name
 * @property string $Email
 * @property string $Surname
 * @property int $Code
 * @property int $group_id
 *
 * @property Group $group
 */
class Student extends \yii\db\ActiveRecord
{
    public $subject_buf;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Student';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Code'], 'integer'],
            [['group_id'], 'string'],
            [['subject_buf'],'safe'],
            [['Name', 'Email', 'Surname'], 'string', 'max' => 65],
            [['group_id'], 'exist', 'skipOnError' => true, 'targetClass' => Group::className(), 'targetAttribute' => ['group_id' => 'ID']],

        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroup()
    {
        return $this->hasOne(Group::className(), ['ID' => 'group_id']);
    }


    public function getSubject()
    {
        return $this->hasOne(Subject::className(), ['ID' => 'Subject']);
    }


    public function getLinks()
    {
        return $this->hasMany(SubjectToStudent::className(), ['student_id' => 'ID']);
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'Name' => 'Name',
            'Email' => 'Email',
            'Surname' => 'Surname',
            'Code' => 'Code',
            'group_id' => 'Group ID',
        ];
    }


}
