<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "subject".
 *
 * @property int $ID
 * @property string $Title
 */
class Subject extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'subject';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID', 'Title'], 'required'],
            [['ID'], 'integer'],
            [['Title'], 'string', 'max' => 65],
            [['ID'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'Title' => 'Title',
        ];
    }
}
