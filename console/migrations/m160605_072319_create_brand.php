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
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable('brand', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'image' => $this->string(),
        ], $tableOptions);

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
