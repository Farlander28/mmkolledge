<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Competencies */

$this->title = Yii::t('all', 'Update Competencies: {name}', [
    'name' => $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('all', 'Competencies'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('all', 'Update');
?>
<div class="competencies-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
