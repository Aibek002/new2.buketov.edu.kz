<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%ref_sort_order_admission_pdf}}`.
 */
class m250701_084030_add_type_ru_column_to_ref_sort_order_admission_pdf_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%ref_sort_order_admission_pdf}}', 'type_ru', $this->text());
        $this->addColumn('{{%ref_sort_order_admission_pdf}}', 'type_kz', $this->text());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%ref_sort_order_admission_pdf}}', 'type_ru');
        $this->dropColumn('{{%ref_sort_order_admission_pdf}}', 'type_kz');
    }
}
