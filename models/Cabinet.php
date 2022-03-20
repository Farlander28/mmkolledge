<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cabinet".
 *
 * @property int $id
 * @property string $number
 * @property string|null $type
 *
 * @property Schedule[] $schedules
 */
class Cabinet extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cabinet';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['number'], 'required'],
            [['number', 'type'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('all', 'ID'),
            'number' => Yii::t('all', 'Number'),
            'type' => Yii::t('all', 'Type'),
        ];
    }

    /**
     * Gets query for [[Schedules]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSchedules()
    {
        return $this->hasMany(Schedule::className(), ['id_cabinet' => 'id']);
    }
}
