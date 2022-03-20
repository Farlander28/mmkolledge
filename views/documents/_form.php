<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Documents */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="documents-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_document_type')->textInput() ?>

    <?= $form->field($model, 'id_program')->textInput() ?>

    <?= $form->field($model, 'availability')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('all', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
