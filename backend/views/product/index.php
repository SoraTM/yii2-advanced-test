<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

//var_dump($dataProvider);

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Add Product', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            'description:ntext',
            [
                'label' => 'Brand',
                'format' => 'text',
                'value' => function ($data) {
                    return $data->brand->name;
                },
            ],

            [
                'label' => 'Photos',
                'format' => 'raw',
                'value' => function ($data) {
                    $images = '';
                    foreach ($data->productImages as $image) {
                        $images .= Html::img(Yii::$app->params['frontUrl'] . ($image->path), [
                                    'style' => 'width:100px;'
                                ]);
                    }
                    return $images;
                    }
            ],

            [
                'label' => 'Brand logo',
                'format' => 'raw',
                'value' => function ($data) {
                return Html::img(Yii::$app->params['frontUrl'] . ($data->brand->image), [
                        'style' => 'width:45px;'
                    ]);
                },
            ],
            [
                'label' => 'Body type',
                'format' => 'text',
                'value' => function ($data) {
                    return $data->bodyType->name;
                },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
