<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%ref_staff}}`.
 */
class m250516_093313_create_ref_staff_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%ref_staff}}', [
            'id' => $this->primaryKey(),
            'type' => $this->text()->notNull(),
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
