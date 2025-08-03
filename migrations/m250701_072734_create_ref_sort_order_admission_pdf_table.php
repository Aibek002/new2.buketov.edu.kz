<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%ref_sort_order}}`.
 */
class m250701_072734_create_ref_sort_order_admission_pdf_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%ref_sort_order_admission_pdf}}', [
            'id' => $this->primaryKey(),
            'type' => $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%ref_sort_order_admission_pdf}}');
    }
}
