<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%events}}`.
 */
class m250516_104427_create_events_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%events}}', [
            'id' => $this->primaryKey(),
            'title' => $this->text(),
            'description' => $this->text(),
            'time' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'time_zone' => $this->text(),
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
