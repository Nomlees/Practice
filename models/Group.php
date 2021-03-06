<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "group".
 *
 * @property int $ID
 * @property string $Title
 * @property string $Curator
 * @property int $Change
 *
 * @property Student[] $students
 */
class Group extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'group';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Title', 'Change'], 'required'],
            [['Change'], 'integer'],
            [['Title'], 'string', 'max' => 30],
            [['Curator'], 'string', 'max' => 20],
        ];
    }
    public function getStudents()
    {
        return $this->hasMany(Student::className(), ['group_id' => 'ID']);
    }


    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'Title' => 'Title',
            'Curator' => 'Curator',

        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */

}
