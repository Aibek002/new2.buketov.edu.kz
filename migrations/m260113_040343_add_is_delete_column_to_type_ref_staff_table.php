<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%type_ref_staff}}`.
 */
class m260113_040343_add_is_delete_column_to_type_ref_staff_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%type_ref_staff}}', 'is_delete', $this->integer()->defaultValue(0));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%type_ref_staff}}', 'is_delete');
    }
}
