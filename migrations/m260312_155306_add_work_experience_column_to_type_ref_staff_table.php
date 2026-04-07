<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%type_ref_staff}}`.
 */
class m260312_155306_add_work_experience_column_to_type_ref_staff_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%type_ref_staff}}', 'work_experience', $this->integer()->notNull());
        $this->addColumn('{{%type_ref_staff}}', 'academic_degree', $this->string(255)->null());
        $this->addColumn('{{%type_ref_staff}}', 'academic_rank', $this->string(255)->null());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%type_ref_staff}}', 'work_experience');
        $this->dropColumn('{{%type_ref_staff}}', 'academic_degree');
        $this->dropColumn('{{%type_ref_staff}}', 'academic_rank');
    }
}
