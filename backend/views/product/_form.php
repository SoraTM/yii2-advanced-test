<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Brand;
use common\models\BodyType;

/* @var $this yii\web\View */
/* @var $model common\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

     <?= $form->field($model, 'imageFiles[]')->fileInput(['multiple' => true, 'accept' => 'image/*']) ?>

    <?php
        $brands = Brand::find()->all();
        $items = ArrayHelper::map($brands, 'id', 'name');
        $params = [
            'prompt' => 'Select product brand'
        ];
    ?>

    <?= $form->field($model, 'brand_id')->dropDownList($items, $params);?>

    <?php
        $bodyTypes = BodyType::find()->all();
        $items = ArrayHelper::map($bodyTypes, 'id', 'name');
        $params = [
            'prompt' => 'Select body type'
        ];
    ?>

    <?= $form->field($model, 'body_type_id')->dropDownList($items, $params);?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Add' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
