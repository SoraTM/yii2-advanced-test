<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\BodyType */

$this->title = 'Create Body Type';
$this->params['breadcrumbs'][] = ['label' => 'Body Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="body-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
