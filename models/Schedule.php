<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "schedule".
 *
 * @property int $id
 * @property string $date
 * @property int $pair_number
 * @property int $id_discipline
 * @property int $id_group
 * @property int $id_cabinet
 * @property int $id_program
 * @property int $id_user
 *
 * @property Cabinet $cabinet
 * @property Discipline $discipline
 * @property Group $group
 * @property Program $program
 * @property User $user
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
            [['date', 'pair_number', 'id_discipline', 'id_group', 'id_cabinet', 'id_program', 'id_user'], 'required'],
            [['date'], 'safe'],
            [['pair_number', 'id_discipline', 'id_group', 'id_cabinet', 'id_program', 'id_user'], 'integer'],
            [['id_cabinet'], 'exist', 'skipOnError' => true, 'targetClass' => Cabinet::className(), 'targetAttribute' => ['id_cabinet' => 'id']],
            [['id_discipline'], 'exist', 'skipOnError' => true, 'targetClass' => Discipline::className(), 'targetAttribute' => ['id_discipline' => 'id']],
            [['id_group'], 'exist', 'skipOnError' => true, 'targetClass' => Group::className(), 'targetAttribute' => ['id_group' => 'id']],
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
            'date' => Yii::t('all', 'Date'),
            'pair_number' => Yii::t('all', 'Pair Number'),
            'id_discipline' => Yii::t('all', 'Id Discipline'),
            'id_group' => Yii::t('all', 'Id Group'),
            'id_cabinet' => Yii::t('all', 'Id Cabinet'),
            'id_program' => Yii::t('all', 'Id Program'),
            'id_user' => Yii::t('all', 'Id User'),
        ];
    }

    /**
     * Gets query for [[Cabinet]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCabinet()
    {
        return $this->hasOne(Cabinet::className(), ['id' => 'id_cabinet']);
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
     * Gets query for [[Group]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGroup()
    {
        return $this->hasOne(Group::className(), ['id' => 'id_group']);
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
