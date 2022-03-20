<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "specialization".
 *
 * @property int $id
 * @property string $code
 * @property string $name
 *
 * @property Discipline[] $disciplines
 * @property Group[] $groups
 * @property Program[] $programs
 */
class Specialization extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'specialization';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code', 'name'], 'required'],
            [['code'], 'string', 'max' => 32],
            [['name'], 'string', 'max' => 255],
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
        ];
    }

    /**
     * Gets query for [[Disciplines]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDisciplines()
    {
        return $this->hasMany(Discipline::className(), ['id_specialization' => 'id']);
    }

    /**
     * Gets query for [[Groups]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGroups()
    {
        return $this->hasMany(Group::className(), ['id_specialization' => 'id']);
    }

    /**
     * Gets query for [[Programs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPrograms()
    {
        return $this->hasMany(Program::className(), ['id_specialization' => 'id']);
    }
}
