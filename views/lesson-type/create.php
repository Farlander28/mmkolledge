<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LessonType */

$this->title = Yii::t('all', 'Create Lesson Type');
$this->params['breadcrumbs'][] = ['label' => Yii::t('all', 'Lesson Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lesson-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
