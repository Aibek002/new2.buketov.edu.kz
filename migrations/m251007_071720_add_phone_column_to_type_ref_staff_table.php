<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%type_ref_staff}}`.
 */
class m251007_071720_add_phone_column_to_type_ref_staff_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%type_ref_staff}}', 'phone', $this->text());
        $this->addColumn('{{%type_ref_staff}}', 'welcome_kz', $this->text());
        $this->addColumn('{{%type_ref_staff}}', 'welcome_ru', $this->text());
        $this->addColumn('{{%type_ref_staff}}', 'welcome_en', $this->text());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%type_ref_staff}}', 'phone');
        $this->dropColumn('{{%type_ref_staff}}', 'welcome_kz');
        $this->dropColumn('{{%type_ref_staff}}', 'welcome_ru');
        $this->dropColumn('{{%type_ref_staff}}', 'welcome_en');
    }
}
