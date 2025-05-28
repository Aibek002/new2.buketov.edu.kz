<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%staff}}`.
 */
class m250528_052207_add_column_to_staff_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%staff}}', 'welcome_kz', $this->text());
        $this->addColumn('{{%staff}}', 'welcome_ru', $this->text());
        $this->addColumn('{{%staff}}', 'welcome_en', $this->text());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%staff}}', 'welcome_kz');
        $this->dropColumn('{{%staff}}', 'welcome_ru');
        $this->dropColumn('{{%staff}}', 'welcome_en');
    }
}
