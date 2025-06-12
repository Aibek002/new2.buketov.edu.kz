<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%profession}}`.
 */
class m250612_043515_create_profession_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%profession}}', [
            'id' => $this->primaryKey(),
            'special_code' => $this->string(255),
            'name_kz' => $this->string(255),
            'name_ru' => $this->string(255),
            'name_en' => $this->string(255),
            'grant' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%profession}}');
    }
}
