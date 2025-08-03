<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%events}}`.
 */
class m250725_065328_add_time_events_column_to_events_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%events}}', 'time_events', $this->date());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%events}}', 'time_events');
    }
}
