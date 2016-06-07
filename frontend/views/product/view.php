<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use frontend\components\TicketForm;

/* @var $this yii\web\View */
/* @var $model common\models\Product */

$this->title = $model->name;
$brandId = $model->brand->id;
$brandName = $model->brand->name;

$this->params['breadcrumbs'][] = ['label' => 'Brands', 'url' => '/brand' ];
$this->params['breadcrumbs'][] = ['label' => $brandName, 'url'  => '/brand/' . $brandId ];
$this->params['breadcrumbs'][] = $this->title;

$images = '';

foreach ($model->productImages as $image) {
    $images .= Html::img(Yii::$app->params['frontUrl'] . ($image->path), [
        'style' => 'width:100%;'
    ]);
}

?>

<div class="product-view">
    <div class="row">

        <h1 class="col-md-12"><?= Html::encode($this->title) ?></h1>
        <div class="col-md-6 product-images">
            <?= $images; ?>
        </div>
        <div class="col-md-6">

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'name',
                'description:ntext',
                [
                    'label' => 'Brand',
                    'value' => $model->brand->name,
                ],
                [
                    'label' => 'Body type',
                    'value' => $model->bodyType->name,
                ]
            ],
            ]) ?>

            <h3>Make a request</h3>
            <?= TicketForm::widget(['productId' => $model->id, 'brandId' => $model->brand->id]) ?>
        </div>
        </div>

    </div>
