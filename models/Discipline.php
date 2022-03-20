<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "discipline".
 *
 * @property int $id
 * @property string $code
 * @property string $name
 * @property int $id_specialization
 *
 * @property Learning[] $learnings
 * @property Program[] $programs
 * @property Schedule[] $schedules
 * @property Specialization $specialization
 */
class Discipline extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'discipline';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code', 'name', 'id_specialization'], 'required'],
            [['id_specialization'], 'integer'],
            [['code'], 'string', 'max' => 32],
            [['name'], 'string', 'max' => 255],
            [['id_specialization'], 'exist', 'skipOnError' => true, 'targetClass' => Specialization::className(), 'targetAttribute' => ['id_specialization' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('all', 'ID'),
            'code' => Yii::t('all', 'Code'),
            'name' => Yii::t('all', 'Name'),
            'id_specialization' => Yii::t('all', 'Id Specialization'),
        ];
    }

    /**
     * Gets query for [[Learnings]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLearnings()
    {
        return $this->hasMany(Learning::className(), ['id_discipline' => 'id']);
    }

    /**
     * Gets query for [[Programs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPrograms()
    {
        return $this->hasMany(Program::className(), ['id_discipline' => 'id']);
    }

    /**
     * Gets query for [[Schedules]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSchedules()
    {
        return $this->hasMany(Schedule::className(), ['id_discipline' => 'id']);
    }

    /**
     * Gets query for [[Specialization]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSpecialization()
    {
        return $this->hasOne(Specialization::className(), ['id' => 'id_specialization']);
    }
}
