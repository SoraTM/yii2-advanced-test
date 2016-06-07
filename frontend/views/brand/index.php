<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/*
$this->title = 'Brands';
$this->params['breadcrumbs'][] = $this->title;*/
?>
<div class="brand-index">

    <div class="jumbotron">
        <h1>Super-Auto Market</h1>

        <p class="lead">Greetings! Select your faivorite brand.</p>

    </div>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'options' => ['class' => 'brands-list'],
        'itemOptions' => ['class' => 'item'],
        'itemView' => function ($model, $key, $index, $widget) {
            return Html::a(Html::img($model->image, ['width' => '100px']), ['view', 'id' => $model->id]);
        },
    ]) ?>
</div>
