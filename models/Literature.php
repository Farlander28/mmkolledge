<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "literature".
 *
 * @property int $id
 * @property string $name
 * @property string $author
 * @property string|null $other_author
 * @property string|null $publisher
 * @property int $year
 * @property int|null $page_count
 * @property string|null $ISBN
 * @property int $id_program
 *
 * @property Program $program
 */
class Literature extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'literature';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'author', 'year', 'id_program'], 'required'],
            [['year', 'page_count', 'id_program'], 'integer'],
            [['name', 'author', 'other_author', 'publisher', 'ISBN'], 'string', 'max' => 255],
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
            'author' => Yii::t('all', 'Author'),
            'other_author' => Yii::t('all', 'Other Author'),
            'publisher' => Yii::t('all', 'Publisher'),
            'year' => Yii::t('all', 'Year'),
            'page_count' => Yii::t('all', 'Page Count'),
            'ISBN' => Yii::t('all', 'Isbn'),
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
