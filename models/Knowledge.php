<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "knowledge".
 *
 * @property int $id
 * @property string $name
 * @property int $id_program
 *
 * @property Program $program
 */
class Knowledge extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'knowledge';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'id_program'], 'required'],
            [['id_program'], 'integer'],
            [['name'], 'string', 'max' => 255],
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
            'id_program' => Yii::t('all', 'Id Program'),
        ];
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
