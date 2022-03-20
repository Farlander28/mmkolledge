<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "theme".
 *
 * @property int $id
 * @property string $name
 * @property int|null $parent
 * @property int|null $count_hours
 * @property int|null $id_lesson
 * @property int $id_program
 * @property int $serial_number
 *
 * @property LessonType $lesson
 * @property Theme $parent0
 * @property Program $program
 * @property Theme[] $themes
 */
class Theme extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'theme';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'id_program'], 'required'],
            [['parent', 'count_hours', 'id_lesson', 'id_program', 'serial_number'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['parent'], 'exist', 'skipOnError' => true, 'targetClass' => Theme::className(), 'targetAttribute' => ['parent' => 'id']],
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
            'name' => Yii::t('all', 'Name'),
            'parent' => Yii::t('all', 'Parent'),
            'count_hours' => Yii::t('all', 'Count Hours'),
            'id_lesson' => Yii::t('all', 'Id Lesson'),
            'id_program' => Yii::t('all', 'Id Program'),
            'serial_number' => Yii::t('all', 'Serial Number'),
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
     * Gets query for [[Parent0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getParent0()
    {
        return $this->hasOne(Theme::className(), ['id' => 'parent']);
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

    /**
     * Gets query for [[Themes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getThemes()
    {
        return $this->hasMany(Theme::className(), ['parent' => 'id']);
    }
}
