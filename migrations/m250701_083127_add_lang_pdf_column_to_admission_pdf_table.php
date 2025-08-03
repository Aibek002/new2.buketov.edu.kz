<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%admission_pdf}}`.
 */
class m250701_083127_add_lang_pdf_column_to_admission_pdf_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%admission_pdf}}', 'lang_pdf', $this->text());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%admission_pdf}}', 'lang_pdf');
    }
}
