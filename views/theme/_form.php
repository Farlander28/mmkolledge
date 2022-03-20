<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Theme */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="theme-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'parent')->textInput() ?>

    <?= $form->field($model, 'count_hours')->textInput() ?>

    <?= $form->field($model, 'id_lesson')->textInput() ?>

    <?= $form->field($model, 'id_program')->textInput() ?>

    <?= $form->field($model, 'serial_number')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('all', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
