<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Program */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="program-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_discipline')->textInput() ?>

    <?= $form->field($model, 'id_specialization')->textInput() ?>

    <?= $form->field($model, 'id_commission')->textInput() ?>

    <?= $form->field($model, 'id_user')->textInput() ?>

    <?= $form->field($model, 'version')->textInput() ?>

    <?= $form->field($model, 'count_hours')->textInput() ?>

    <?= $form->field($model, 'introduction_date')->textInput() ?>

    <?= $form->field($model, 'learning_cycle')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'application')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'place_discipline')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'attestation')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'support')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'evaluation_criterion')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'evaluation_method')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('all', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
