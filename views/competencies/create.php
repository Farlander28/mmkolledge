<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Competencies */

$this->title = Yii::t('all', 'Create Competencies');
$this->params['breadcrumbs'][] = ['label' => Yii::t('all', 'Competencies'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="competencies-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
