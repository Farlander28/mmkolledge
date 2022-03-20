<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Literature */

$this->title = Yii::t('all', 'Update Literature: {name}', [
    'name' => $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('all', 'Literatures'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('all', 'Update');
?>
<div class="literature-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
