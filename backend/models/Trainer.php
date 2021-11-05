<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "trainer".
 *
 * @property int $t_id
 * @property string $t_name
 * @property int $age
 * @property string $email
 * @property string $job_title
 * @property string $mobile_number
 * @property int $s_id
 * @property string $imageUrl
 * @property string $address
 * @property string $t_status
 *
 * @property Slot $s
 * @property Schedule[] $schedules
 */
class Trainer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'trainer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['t_name', 'age', 'email', 'job_title', 'mobile_number', 's_id', 'address'], 'required'],
            [['age', 's_id','mobile_number'], 'integer'],
            [['t_status'], 'string'],
            ['imageUrl', 'image', 'extensions' => 'jpg, jpeg, png'],
            [['t_name', 'email', 'job_title', 'mobile_number'], 'string', 'max' => 30],
            [['address'], 'string', 'max' => 55],
            [['s_id'], 'exist', 'skipOnError' => true, 'targetClass' => Slot::className(), 'targetAttribute' => ['s_id' => 's_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            't_id' => 'Trainer ID',
            't_name' => 'Trainer Name',
            'age' => 'Age',
            'email' => 'Email',
            'job_title' => 'Job Title',
            'mobile_number' => 'Mobile Number',
            's_id' => 'Select Slot',
            'imageUrl' => 'Image Url',
            'address' => 'Address',
            't_status' => 'Trainer Status',
        ];
    }

    /**
     * Gets query for [[S]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getS()
    {
        return $this->hasOne(Slot::className(), ['s_id' => 's_id']);
    }

    /**
     * Gets query for [[Schedules]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSchedules()
    {
        return $this->hasMany(Schedule::className(), ['t_id' => 't_id']);
    }
}
