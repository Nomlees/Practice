<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "subject_to_student".
 *
 * @property int $ID
 * @property int $student_id
 * @property string $subject_id
 */
class SubjectToStudent extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'subject_to_student';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['student_id'], 'integer'],
            [['subject_id'], 'integer'],
        ];
    }

    public function getStudent()
    {
        return $this->hasOne(Student::className(), ['ID' => 'student_id']);
    }

    public function getSubject()
    {
        return $this->hasOne(Subject::className(), ['ID' => 'subject_id']);
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'student_id' => 'Student ID',
            'subject_id' => 'Subject ID',
        ];
    }
}
