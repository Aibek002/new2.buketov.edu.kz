<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%faculty}}`.
 */
class m250527_103307_create_faculty_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%faculty}}', [
            'id' => $this->primaryKey(),
            'name_kz' => $this->string(255),
            'name_ru' => $this->string(255),
            'name_en' => $this->string(255),
            'information_kz' => $this->text(),
            'information_ru' => $this->text(),
            'information_en' => $this->text(),
            'welcome_kz' => $this->text(),
            'welcome_ru' => $this->text(),
            'welcome_en' => $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%faculty}}');
    }
}
