<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%ref_files}}`.
 */
class m250819_054626_create_ref_files_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%ref_files}}', [
            'id' => $this->primaryKey(),
            'type' => $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%ref_files}}');
    }
}
