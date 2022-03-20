<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "documents".
 *
 * @property int $id
 * @property int $id_document_type
 * @property int $id_program
 * @property int $availability
 *
 * @property DocumentType $documentType
 * @property Program $program
 */
class Documents extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'documents';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_document_type', 'id_program', 'availability'], 'required'],
            [['id_document_type', 'id_program', 'availability'], 'integer'],
            [['id_document_type'], 'exist', 'skipOnError' => true, 'targetClass' => DocumentType::className(), 'targetAttribute' => ['id_document_type' => 'id']],
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
            'id_document_type' => Yii::t('all', 'Id Document Type'),
            'id_program' => Yii::t('all', 'Id Program'),
            'availability' => Yii::t('all', 'Availability'),
        ];
    }

    /**
     * Gets query for [[DocumentType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDocumentType()
    {
        return $this->hasOne(DocumentType::className(), ['id' => 'id_document_type']);
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
