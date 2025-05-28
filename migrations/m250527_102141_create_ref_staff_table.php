<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%ref_staff}}`.
 */
class m250527_102141_create_ref_staff_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%ref_staff}}', [
            'id' => $this->primaryKey(),
            'type' => $this->string(255),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%ref_staff}}');
    }
}
