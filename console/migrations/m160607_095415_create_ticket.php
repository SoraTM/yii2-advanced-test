<?php

use yii\db\Migration;

/**
* Handles the creation for table `ticket`.
*/
class m160607_095415_create_ticket extends Migration
{
    /**
    * @inheritdoc
    */
    public function up()
    {
        $this->createTable('ticket', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'phone' => $this->string()->notNull(),
            'brand_id' => $this->integer()->notNull(),
            'product_id' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey(
        'fk-ticket-product_id',
        'ticket',
        'product_id',
        'product',
        'id',
        'CASCADE');

        $this->addForeignKey(
        'fk-ticket-brand_id',
        'ticket',
        'brand_id',
        'brand',
        'id',
        'CASCADE');
    }

    /**
    * @inheritdoc
    */
    public function down()
    {
        $this->dropTable('ticket');
    }
}
