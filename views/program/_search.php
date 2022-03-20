<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProgramSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="program-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_discipline') ?>

    <?= $form->field($model, 'id_specialization') ?>

    <?= $form->field($model, 'id_commission') ?>

    <?= $form->field($model, 'id_user') ?>

    <?php // echo $form->field($model, 'version') ?>

    <?php // echo $form->field($model, 'count_hours') ?>

    <?php // echo $form->field($model, 'introduction_date') ?>

    <?php // echo $form->field($model, 'learning_cycle') ?>

    <?php // echo $form->field($model, 'application') ?>

    <?php // echo $form->field($model, 'place_discipline') ?>

    <?php // echo $form->field($model, 'attestation') ?>

    <?php // echo $form->field($model, 'support') ?>

    <?php // echo $form->field($model, 'evaluation_criterion') ?>

    <?php // echo $form->field($model, 'evaluation_method') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('all', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('all', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
