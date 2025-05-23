<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%faculties}}`.
 */
class m250516_092339_create_faculty_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%faculty}}', [
            'id' => $this->primaryKey(),
            'name' => $this->text()->notNull(),
            'information' => $this->text(),
            'welcome' => $this->text(),
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
