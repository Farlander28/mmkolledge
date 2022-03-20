<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Program */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('all', 'Programs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="program-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('all', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('all', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('all', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'id_discipline',
            'id_specialization',
            'id_commission',
            'id_user',
            'version',
            'count_hours',
            'introduction_date',
            'learning_cycle',
            'application:ntext',
            'place_discipline:ntext',
            'attestation',
            'support',
            'evaluation_criterion:ntext',
            'evaluation_method:ntext',
        ],
    ]) ?>

</div>
