<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%ref_type_profession}}`.
 */
class m250612_094510_create_ref_type_profession_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%ref_type_profession}}', [
            'id' => $this->primaryKey(),
            'type' => $this->string(255),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%ref_type_profession}}');
    }
}
