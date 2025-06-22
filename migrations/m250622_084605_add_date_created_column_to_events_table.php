<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%events}}`.
 */
class m250622_084605_add_date_created_column_to_events_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%events}}', 'date_created', $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'));

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%events}}', 'date_created');
    }
}
