<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%applicant_for_academic_titles}}`.
 */
class m250820_060757_create_applicant_for_academic_titles_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%applicant_for_academic_titles}}', [
            'id' => $this->primaryKey(),
            'full_name_kz' => $this->text(),
            'full_name_ru' => $this->text(),
            'full_name_en' => $this->text(),
            'author' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%applicant_for_academic_titles}}');
    }
}
