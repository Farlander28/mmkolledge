<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "program".
 *
 * @property int $id
 * @property int $id_discipline
 * @property int $id_specialization
 * @property int $id_commission
 * @property int $id_user
 * @property int $version
 * @property int $count_hours
 * @property string $introduction_date
 * @property string $learning_cycle
 * @property string $application
 * @property string $place_discipline
 * @property string $attestation
 * @property string|null $support
 * @property string|null $evaluation_criterion
 * @property string|null $evaluation_method
 *
 * @property Commission $commission
 * @property Competencies[] $competencies
 * @property Discipline $discipline
 * @property Documents[] $documents
 * @property Knowledge[] $knowledge
 * @property Learning[] $learnings
 * @property Literature[] $literatures
 * @property Schedule[] $schedules
 * @property SemesterHours[] $semesterHours
 * @property Skills[] $skills
 * @property Specialization $specialization
 * @property Theme[] $themes
 * @property User $user
 */
class Program extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'program';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_discipline', 'id_specialization', 'id_commission', 'id_user', 'version', 'count_hours', 'introduction_date', 'learning_cycle', 'application', 'place_discipline', 'attestation'], 'required'],
            [['id_discipline', 'id_specialization', 'id_commission', 'id_user', 'version', 'count_hours'], 'integer'],
            [['introduction_date'], 'safe'],
            [['application', 'place_discipline', 'evaluation_criterion', 'evaluation_method'], 'string'],
            [['learning_cycle', 'attestation'], 'string', 'max' => 255],
            [['support'], 'string', 'max' => 1000],
            [['id_commission'], 'exist', 'skipOnError' => true, 'targetClass' => Commission::className(), 'targetAttribute' => ['id_commission' => 'id']],
            [['id_discipline'], 'exist', 'skipOnError' => true, 'targetClass' => Discipline::className(), 'targetAttribute' => ['id_discipline' => 'id']],
            [['id_specialization'], 'exist', 'skipOnError' => true, 'targetClass' => Specialization::className(), 'targetAttribute' => ['id_specialization' => 'id']],
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
            'id_specialization' => Yii::t('all', 'Id Specialization'),
            'id_commission' => Yii::t('all', 'Id Commission'),
            'id_user' => Yii::t('all', 'Id User'),
            'version' => Yii::t('all', 'Version'),
            'count_hours' => Yii::t('all', 'Count Hours'),
            'introduction_date' => Yii::t('all', 'Introduction Date'),
            'learning_cycle' => Yii::t('all', 'Learning Cycle'),
            'application' => Yii::t('all', 'Application'),
            'place_discipline' => Yii::t('all', 'Place Discipline'),
            'attestation' => Yii::t('all', 'Attestation'),
            'support' => Yii::t('all', 'Support'),
            'evaluation_criterion' => Yii::t('all', 'Evaluation Criterion'),
            'evaluation_method' => Yii::t('all', 'Evaluation Method'),
        ];
    }

    /**
     * Gets query for [[Commission]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCommission()
    {
        return $this->hasOne(Commission::className(), ['id' => 'id_commission']);
    }

    public function getCommissionName()
    {
        $commission = $this->commission;
        return $commission ? $commission->name : '';
    }

    /**
     * Gets query for [[Competencies]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCompetencies()
    {
        return $this->hasMany(Competencies::className(), ['id_program' => 'id']);
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

    public function getDisciplineName()
    {
        $discipline = $this->discipline;
        return $discipline ? $discipline->name : '';
    }

    /**
     * Gets query for [[Documents]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDocuments()
    {
        return $this->hasMany(Documents::className(), ['id_program' => 'id']);
    }

    /**
     * Gets query for [[Knowledges]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKnowledge()
    {
        return $this->hasMany(Knowledge::className(), ['id_program' => 'id']);
    }

    /**
     * Gets query for [[Learnings]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLearnings()
    {
        return $this->hasMany(Learning::className(), ['id_program' => 'id']);
    }

    /**
     * Gets query for [[Literatures]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLiteratures()
    {
        return $this->hasMany(Literature::className(), ['id_program' => 'id']);
    }

    /**
     * Gets query for [[Schedules]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSchedules()
    {
        return $this->hasMany(Schedule::className(), ['id_program' => 'id']);
    }

    /**
     * Gets query for [[SemesterHours]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSemesterHours()
    {
        return $this->hasMany(SemesterHours::className(), ['id_program' => 'id']);
    }

    /**
     * Gets query for [[Skills]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSkills()
    {
        return $this->hasMany(Skills::className(), ['id_program' => 'id']);
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

    public function getSpecializationName()
    {
        $specialization = $this->specialization;
        return $specialization ? $specialization->name : '';
    }

    /**
     * Gets query for [[Themes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getThemes()
    {
        return $this->hasMany(Theme::className(), ['id_program' => 'id']);
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

    public function getUserName()
    {
        $user = $this->user;
        return $user ? $user->fullName : '';
    }
}
