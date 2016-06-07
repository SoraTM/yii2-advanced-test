<?php

namespace frontend\components;

use Yii;
use yii\base\Widget;
use yii\helpers\Html;
use common\models\Ticket;
use yii\widgets\ActiveForm;

class TicketForm extends Widget
{
    public $model;
    public $productId;
    public $brandId;

    public function init()
    {
        parent::init();
        $this->model = new Ticket();
    }

    public function run()
    {
        return $this->render('TicketFormView',
        [
            'model' => $this->model,
            'productId' => $this->productId,
            'brandId' => $this->brandId,
        ]);
    }
}
