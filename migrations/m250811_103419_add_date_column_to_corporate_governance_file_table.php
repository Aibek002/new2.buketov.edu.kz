<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%corporate_governance_file}}`.
 */
class m250811_103419_add_date_column_to_corporate_governance_file_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%corporate_governance_file}}', 'date', $this->text());
        $this->addColumn('{{%corporate_governance_file}}', 'text', $this->text());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%corporate_governance_file}}', 'date');
        $this->dropColumn('{{%corporate_governance_file}}', 'text');
    }
}
