<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\data\ActiveDataProvider;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $model common\models\Brand */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Brands', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$products = $model->getProducts();
$dataProviderProducts = new ActiveDataProvider([
    'query' => $products,
]);

?>
<div class="brand-view">

    <h1><?= Html::encode($this->title) ?></h1>
    
    <h3>Select model</h3>

    <?= ListView::widget([
        'dataProvider' => $dataProviderProducts,
        'options' => ['class' => 'product-list'],
        'itemOptions' => ['class' => 'item'],
        'itemView' => function ($model, $key, $index, $widget) {
            return Html::a(Html::encode($model->name), ['product/view', 'id' => $model->id]);
        },
    ]) ?>



</div>
