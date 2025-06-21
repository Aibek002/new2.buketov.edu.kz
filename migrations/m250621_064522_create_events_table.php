<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%events}}`.
 */
class m250621_064522_create_events_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%events}}', [
            'id' => $this->primaryKey(),
            'title_kz' => $this->text(),
            'title_ru' => $this->text(),
            'title_en' => $this->text(),
            'content_kz' => $this->text(),
            'content_ru' => $this->text(),
            'content_en' => $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%events}}');
    }
}
