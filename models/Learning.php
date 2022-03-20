<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "learning".
 *
 * @property int $id
 * @property int $id_discipline
 * @property int|null $id_user
 * @property int|null $id_program
 *
 * @property Discipline $discipline
 * @property Program $program
 * @property User $user
 */
class Learning extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'learning';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_discipline'], 'required'],
            [['id_discipline', 'id_user', 'id_program'], 'integer'],
            [['id_discipline'], 'exist', 'skipOnError' => true, 'targetClass' => Discipline::className(), 'targetAttribute' => ['id_discipline' => 'id']],
            [['id_program'], 'exist', 'skipOnError' => true, 'targetClass' => Program::className(), 'targetAttribute' => ['id_program' => 'id']],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('all', 'ID'),
            'id_discipline' => Yii::t('all', 'Id Discipline'),
            'id_user' => Yii::t('all', 'Id User'),
            'id_program' => Yii::t('all', 'Id Program'),
        ];
    }

    /**
     * Gets query for [[Discipline]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDiscipline()
    {
        return $this->hasOne(Discipline::className(), ['id' => 'id_discipline']);
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
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }
}
