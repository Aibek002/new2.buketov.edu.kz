<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%ref_image}}`.
 */
class m250630_062751_create_ref_image_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%ref_image}}', [
            'id' => $this->primaryKey(),
            'page_name' => $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%ref_image}}');
    }
}
