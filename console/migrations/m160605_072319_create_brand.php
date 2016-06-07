<?php

use yii\db\Migration;

/**
 * Handles the creation for table `brand`.
 */
class m160605_072319_create_brand extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('brand', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'image' => $this->string(),
        ]);

        $this->insert('brand', [
           'name' => 'bmw',
           'image' => '/uploads/brand_logo/bmw_logo.png',
        ]);

        $this->insert('brand', [
           'name' => 'mazda',
           'image' => '/uploads/brand_logo/mazda_logo.png',
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('brand');
    }
}
