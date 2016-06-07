<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Ticket */

$this->title = $model->name;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ticket-view">

    <h1>Thank you!</h1>
    <h4>Detail ticket info.</h4>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'label' => 'Ticket №',
                'value' => $model->id,
            ],
            [
                'label' => 'Your name',
                'value' => $model->name,
            ],
            'phone',
            [
                'label' => 'Auto brand',
                'value' => $model->brand->name,
            ],
            [
                'label' => 'Product name',
                'value' => $model->product->name,
            ],
        ],
    ]) ?>

</div>
