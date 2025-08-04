<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%corporate_governance_file}}`.
 */
class m250804_074553_add_fileName_column_to_corporate_governance_file_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%corporate_governance_file}}', 'fileName', $this->text()->notNull());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%corporate_governance_file}}', 'fileName');
    }
}
