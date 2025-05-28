<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%ref_social}}`.
 */
class m250527_102152_create_ref_social_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%ref_social}}', [
            'id' => $this->primaryKey(),
            'type' => $this->string(255),
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
