<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SemesterHours */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="semester-hours-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'number')->textInput() ?>

    <?= $form->field($model, 'count_hors')->textInput() ?>

    <?= $form->field($model, 'id_lesson')->textInput() ?>

    <?= $form->field($model, 'id_program')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('all', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
