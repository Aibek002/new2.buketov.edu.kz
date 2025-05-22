<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%ref_articles}}`.
 */
class m250516_103136_create_ref_articles_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%ref_articles}}', [
            'id' => $this->primaryKey(),
            'type' => $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%ref_articles}}');
    }
}
