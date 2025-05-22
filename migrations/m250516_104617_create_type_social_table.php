<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%type_social}}`.
 */
class m250516_104617_create_type_social_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%type_social}}', [
            'id' => $this->primaryKey(),
            'type' => $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%type_social}}');
    }
}
