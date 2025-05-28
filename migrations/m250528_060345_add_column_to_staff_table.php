<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%staff}}`.
 */
class m250528_060345_add_column_to_staff_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%staff}}', 'job_title_kz', $this->text());
        $this->addColumn('{{%staff}}', 'job_title_ru', $this->text());
        $this->addColumn('{{%staff}}', 'job_title_en', $this->text());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%staff}}', 'job_title_kz');
        $this->dropColumn('{{%staff}}', 'job_title_ru');
        $this->dropColumn('{{%staff}}', 'job_title_en');
    }
}
