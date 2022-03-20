<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * This is the model class for table "knowledges".
 *
 * @property int $discipline
 * @property string $skills
 */
class SkillsProgram extends Model
{
    public $discipline;
    public $skills;

    public function rules()
    {
        return [
            [['skills', 'discipline'], 'required'],
            [['discipline'], 'integer'],
            [['skills'], 'string'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'skills' => Yii::t('all', 'Skills'),
            'discipline' => 'Наименование дисциплины',
        ];
    }

    public function getProgram()
    {
        return $this->hasOne(Program::className(), ['id' => 'id_program']);
    }

    public function getDisciplineName()
    {
        $discipline = $this->program;
        return $discipline ? $discipline->disciplineName : '';
    }
}
