<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Product managment</h2>

                <p>Adding and editing products on site</p>

                <p><?= Html::a('Products', Url::to(['/product'], false), ['class' => 'btn btn-default']); ?></p>
            </div>
            <div class="col-lg-4">
                <h2>Brand managment</h2>

                <p>Adding and editing brands on site</p>

                <p><?= Html::a('Brands', Url::to(['/brand'], false), ['class' => 'btn btn-default']); ?></p>
            </div>
            <div class="col-lg-4">
                <h2>Body types managment</h2>

                <p>Adding and editing body types on site</p>

                <p><?= Html::a('Body types', Url::to(['/body-type'], false), ['class' => 'btn btn-default']); ?></p>
            </div>
        </div>

    </div>
</div>
