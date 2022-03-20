<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lesson_type".
 *
 * @property int $id
 * @property string|null $type
 *
 * @property SemesterHours[] $semesterHours
 * @property Theme[] $themes
 */
class LessonType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lesson_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('all', 'ID'),
            'type' => Yii::t('all', 'Type'),
        ];
    }

    /**
     * Gets query for [[SemesterHours]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSemesterHours()
    {
        return $this->hasMany(SemesterHours::className(), ['id_lesson' => 'id']);
    }

    /**
     * Gets query for [[Themes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getThemes()
    {
        return $this->hasMany(Theme::className(), ['id_lesson' => 'id']);
    }
}
