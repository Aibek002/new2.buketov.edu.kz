<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%skill_level}}`.
 */
class m250612_094423_create_skill_level_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%skill_level}}', [
            'id' => $this->primaryKey(),
            'type_en' => $this->string(255),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%skill_level}}');
    }
    

}
