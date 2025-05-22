<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%ref_social}}`.
 */
class m250516_104605_create_ref_social_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%ref_social}}', [
            'id' => $this->primaryKey(),
            'type' => $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%ref_social}}');
    }
}
