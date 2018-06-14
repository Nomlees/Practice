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
            [['Name', 'group_id'], 'required'],
            [['Code'], 'integer'],
            [['group_id'], 'string'],
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
