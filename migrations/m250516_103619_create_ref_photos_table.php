<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%ref_photos}}`.
 */
class m250516_103619_create_ref_photos_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%ref_photos}}', [
            'id' => $this->primaryKey(),
            'type' => $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%ref_photos}}');
    }
}
