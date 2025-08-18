<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%staff}}`.
 */
class m250818_083730_add_faculty_show_column_to_staff_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%staff}}', 'faculty_show', $this->integer()->defaultValue(1));
        $this->addColumn('{{%staff}}', 'dissertation_show', $this->integer()->defaultValue(1));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%staff}}', 'faculty_show');
        $this->dropColumn('{{%staff}}', 'dissertation_show');
    }
}
