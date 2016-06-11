<?php

use yii\db\Migration;

/**
* Handles the creation for table `product`.
*/
class m160605_140050_create_product extends Migration
{
    /**
    * @inheritdoc
    */
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable('product', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'description' => $this->text(),
            'brand_id' => $this->integer()->notNull(),
            'body_type_id' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->addForeignKey(
            'fk-product-brand_id',
            'product',
            'brand_id',
            'brand',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-product-body_id',
            'product',
            'body_type_id',
            'body_type',
            'id',
            'CASCADE'
        );

        $this->insert('product', [
            'name' => 'mazda cx5',
            'description' => 'The Mazda CX-5 is a compact crossover produced by Mazda starting in 2012 for the 2013 model year lineup. It is Mazda first car featuring the new KODO Soul of Motion Design language first shown in the Shinari concept vehicle in May 2011.',
            'brand_id' => 2,
            'body_type_id' => 3,
        ]);

        $this->insert('product', [
            'name' => 'bmw m3',
            'description' => 'The BMW M3 remains the only car ever to have earned more titles than the venerable Porsche 911 in Motorsport, and also is the most successful touring, and grand touring car ever to have participated in racing.',
            'brand_id' => 1,
            'body_type_id' => 1,
        ]);

        $this->insert('product', [
            'name' => 'bmw m5',
            'description' => 'BMW M5 1.8 Quadro turbo 1200 Hp. ',
            'brand_id' => 1,
            'body_type_id' => 2,
        ]);
    }

/**
* @inheritdoc
*/
public function down()
{
    $this->dropTable('product');
}
}
