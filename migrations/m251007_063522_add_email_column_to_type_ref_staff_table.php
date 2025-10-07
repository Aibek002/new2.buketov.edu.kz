<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%type_ref_staff}}`.
 */
class m251007_063522_add_email_column_to_type_ref_staff_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%type_ref_staff}}', 'email', $this->text());
        $this->addColumn('{{%type_ref_staff}}', 'information_kz', $this->text());
        $this->addColumn('{{%type_ref_staff}}', 'information_ru', $this->text());
        $this->addColumn('{{%type_ref_staff}}', 'information_en', $this->text());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%type_ref_staff}}', 'email');
        $this->dropColumn('{{%type_ref_staff}}', 'information_kz');
        $this->dropColumn('{{%type_ref_staff}}', 'information_ru');
        $this->dropColumn('{{%type_ref_staff}}', 'information_en');
    }
}
