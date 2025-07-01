<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%admission_pdf}}`.
 */
class m250701_082827_add_name_url_column_to_admission_pdf_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%admission_pdf}}', 'name_url', $this->text());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%admission_pdf}}', 'name_url');
    }
}
