<?php

use yii\db\Migration;

class m250711_102356_add_column_lang_to_table_corporate_governance_sole_shareholder_decision_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('corporate_governance_sole_shareholder_decision', 'lang', $this->string(255));
    }

    public function safeDown()
    {
        $this->dropColumn('corporate_governance_sole_shareholder_decision', 'lang');
    }


    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250711_102356_add_column_lang_to_table_corporate_governance_sole_shareholder_decision_table cannot be reverted.\n";

        return false;
    }
    */
}
