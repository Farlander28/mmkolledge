<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "semester_hours".
 *
 * @property int $id
 * @property int $number
 * @property int $count_hors
 * @property int $id_lesson
 * @property int $id_program
 *
 * @property LessonType $lesson
 * @property Program $program
 */
class SemesterHours extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'semester_hours';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['number', 'count_hors', 'id_lesson', 'id_program'], 'required'],
            [['number', 'count_hors', 'id_lesson', 'id_program'], 'integer'],
            [['id_lesson'], 'exist', 'skipOnError' => true, 'targetClass' => LessonType::className(), 'targetAttribute' => ['id_lesson' => 'id']],
            [['id_program'], 'exist', 'skipOnError' => true, 'targetClass' => Program::className(), 'targetAttribute' => ['id_program' => 'id']],
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
            'count_hors' => Yii::t('all', 'Count Hors'),
            'id_lesson' => Yii::t('all', 'Id Lesson'),
            'id_program' => Yii::t('all', 'Id Program'),
        ];
    }

    /**
     * Gets query for [[Lesson]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLesson()
    {
        return $this->hasOne(LessonType::className(), ['id' => 'id_lesson']);
    }

    /**
     * Gets query for [[Program]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProgram()
    {
        return $this->hasOne(Program::className(), ['id' => 'id_program']);
    }
}
