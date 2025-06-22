<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%events}}`.
 */
class m250622_083954_add_year_column_to_events_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%events}}', 'year', $this->integer());
        $this->addColumn('{{%events}}', 'month', $this->string(255));
        $this->addColumn('{{%events}}', 'day', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%events}}', 'year');
        $this->dropColumn('{{%events}}', 'month');
        $this->dropColumn('{{%events}}', 'day');
    }
}
