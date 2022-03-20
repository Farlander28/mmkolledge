<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SemesterHours */

$this->title = Yii::t('all', 'Create Semester Hours');
$this->params['breadcrumbs'][] = ['label' => Yii::t('all', 'Semester Hours'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="semester-hours-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
