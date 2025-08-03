<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%ref_corporate_governance}}`.
 */
class m250803_054332_create_ref_corporate_governance_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%ref_corporate_governance}}', [
            'id' => $this->primaryKey(),
            'type' => $this->string(255),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%ref_corporate_governance}}');
    }
}
