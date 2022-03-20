<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * This is the model class for table "knowledges".
 *
 * @property int $discipline
 * @property string $knowledge
 */
class KnowledgeProgram extends Model
{
    public $discipline;
    public $knowledge;

    public function rules()
    {
        return [
            [['knowledge', 'discipline'], 'required'],
            [['discipline'], 'integer'],
            [['knowledge'], 'string'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'knowledge' => Yii::t('all', 'Knowledge'),
            'discipline' => Yii::t('all', 'Discipline'),
        ];
    }
}
