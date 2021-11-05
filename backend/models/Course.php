<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "course".
 *
 * @property int $c_id
 * @property string $c_name
 * @property string $description
 * @property float $price
 * @property float $hours
 * @property string $c_code
 * @property string $c_status
 *
 * @property Schedule[] $schedules
 */
class Course extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'course';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['c_name', 'description', 'price', 'hours', 'c_code'], 'required'],
            [['description', 'c_status'], 'string'],
            [['price', 'hours'], 'number'],
            [['c_name', 'c_code'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'c_id' => 'C ID',
            'c_name' => 'Couse Name',
            'description' => 'Description',
            'price' => 'Price (£)',
            'hours' => 'Hours',
            'c_code' => 'Course Code',
            'c_status' => 'Status',
        ];
    }

    /**
     * Gets query for [[Schedules]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSchedules()
    {
        return $this->hasMany(Schedule::className(), ['c_id' => 'c_id']);
    }
}
