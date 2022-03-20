<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Learning */

$this->title = Yii::t('all', 'Update Learning: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('all', 'Learnings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('all', 'Update');
?>
<div class="learning-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
