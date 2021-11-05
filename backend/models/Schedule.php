<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "schedule".
 *
 * @property int $sh_id
 * @property int $c_id
 * @property int $t_id
 * @property int $s_id
 * @property string $location
 * @property string $date
 * @property string $sh_status
 *
 * @property Course $c
 * @property Slot $s
 * @property Trainer $t
 */
class Schedule extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'schedule';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['c_id', 't_id', 's_id', 'location', 'date'], 'required'],
            [['c_id', 't_id', 's_id'], 'integer'],
            [['date'], 'safe'],
            [['sh_status'], 'string'],
            [['location'], 'string', 'max' => 30],
            [['c_id'], 'exist', 'skipOnError' => true, 'targetClass' => Course::className(), 'targetAttribute' => ['c_id' => 'c_id']],
            [['s_id'], 'exist', 'skipOnError' => true, 'targetClass' => Slot::className(), 'targetAttribute' => ['s_id' => 's_id']],
            [['t_id'], 'exist', 'skipOnError' => true, 'targetClass' => Trainer::className(), 'targetAttribute' => ['t_id' => 't_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'sh_id' => 'Sh ID',
            'c_id' => 'Course Name',
            't_id' => 'Trainer Name',
            's_id' => 'Slot Name',
            'location' => 'Location',
            'date' => 'Date',
            'sh_status' => 'Status',
        ];
    }

    /**
     * Gets query for [[C]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getC()
    {
        return $this->hasOne(Course::className(), ['c_id' => 'c_id']);
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
     * Gets query for [[T]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getT()
    {
        return $this->hasOne(Trainer::className(), ['t_id' => 't_id']);
    }
}
