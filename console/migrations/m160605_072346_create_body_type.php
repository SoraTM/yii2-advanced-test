<?php

use yii\db\Migration;

/**
 * Handles the creation for table `body_type`.
 */
class m160605_072346_create_body_type extends Migration
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

        $this->createTable('body_type', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
        ], $tableOptions);

        $this->insert('body_type', [
           'name' => 'coupe',
        ]);

        $this->insert('body_type', [
          'name' => 'sedan',
        ]);

        $this->insert('body_type', [
         'name' => 'hatchback',
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('body_type');
    }
}
