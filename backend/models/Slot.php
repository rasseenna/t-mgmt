<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "slot".
 *
 * @property int $s_id
 * @property string $s_name
 * @property string $from_time
 * @property string $to_time
 * @property string $s_status
 *
 * @property Schedule[] $schedules
 * @property Trainer[] $trainers
 */
class Slot extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'slot';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['s_name', 'from_time', 'to_time'], 'required'],
            [['s_status'], 'string'],
            [['s_name', 'from_time', 'to_time'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            's_id' => 'S ID',
            's_name' => 'Slot Name',
            'from_time' => 'From Time',
            'to_time' => 'To Time',
            's_status' => 'Slot Status',
        ];
    }

    /**
     * Gets query for [[Schedules]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSchedules()
    {
        return $this->hasMany(Schedule::className(), ['s_id' => 's_id']);
    }

    /**
     * Gets query for [[Trainers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTrainers()
    {
        return $this->hasMany(Trainer::className(), ['s_id' => 's_id']);
    }
}
