<?php

use yii\db\Migration;

/**
 * Handles the creation for table `image`.
 */
class m160605_140059_create_product_image extends Migration
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

        $this->createTable('product_image', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer()->notNull(),
            'path' => $this->string()->notNull(),
        ], $tableOptions);

        $this->addForeignKey(
            'fk-product_image-product_id',
            'product_image',
            'product_id',
            'product',
            'id',
            'CASCADE'
        );

        $this->insert('product_image', [
            'product_id' => '1',
            'path' => '/uploads/product_image/mazda.png',
        ]);

        $this->insert('product_image', [
            'product_id' => '2',
            'path' => '/uploads/product_image/bmw.jpg',
        ]);

        $this->insert('product_image', [
            'product_id' => '2',
            'path' => '/uploads/product_image/bmw2.jpg',
        ]);

        $this->insert('product_image', [
            'product_id' => '3',
            'path' => '/uploads/product_image/bmwm5.jpg',
        ]);

        $this->insert('product_image', [
            'product_id' => '3',
            'path' => '/uploads/product_image/bmwm52.jpg',
        ]);
    }
    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('product_image');
    }
}
