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
        $this->createTable('body_type', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
        ]);

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
