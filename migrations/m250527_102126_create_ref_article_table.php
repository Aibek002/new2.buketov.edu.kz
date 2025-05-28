<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%ref_article}}`.
 */
class m250527_102126_create_ref_article_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%ref_article}}', [
            'id' => $this->primaryKey(),
            'type' => $this->string(255),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%ref_article}}');
    }
}
