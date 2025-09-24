<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%feedback_form_message}}`.
 */
class m250924_171733_create_feedback_form_message_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%feedback_form_message}}', [
            'id' => $this->primaryKey(),
            'status' => $this->integer()->notNull()->defaultValue(0),
            'title' => $this->text(),
            'message' => $this->text(),
            'email' => $this->text(),
            'question_id' => $this->integer(),
            'date_time' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'type_message' => $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%feedback_form_message}}');
    }
}
