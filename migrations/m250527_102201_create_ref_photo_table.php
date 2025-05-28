<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%ref_photo}}`.
 */
class m250527_102201_create_ref_photo_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%ref_photo}}', [
            'id' => $this->primaryKey(),
            'type' => $this->string(255),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%ref_photo}}');
    }
}
