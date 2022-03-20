<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Learning */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="learning-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_discipline')->textInput() ?>

    <?= $form->field($model, 'id_user')->textInput() ?>

    <?= $form->field($model, 'id_program')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('all', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
