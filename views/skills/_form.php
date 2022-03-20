<?php

use app\models\Program;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\redactor\widgets\Redactor;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Skills */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="skills-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'discipline')->dropDownList(
        ArrayHelper::map(Program::find()->all(), 'id', 'disciplineName')
    ) ?>

    <? try {
        echo $form->field($model, 'skills')->widget(Redactor::className());
    } catch (Exception $e) {} ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('all', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
