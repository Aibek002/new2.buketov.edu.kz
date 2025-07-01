<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%admission_pdf}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%ref_sort_order}}`
 * - `{{%skill_level}}`
 */
class m250701_073139_create_admission_pdf_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%admission_pdf}}', [
            'id' => $this->primaryKey(),
            'ref_sort_order_id' => $this->integer(),
            'skill_level_id' => $this->integer(),
            'path' => $this->text(),
            'archive' => $this->integer(),
        ]);

        // creates index for column `ref_sort_order_id`
        $this->createIndex(
            '{{%idx-admission_pdf-ref_sort_order_admission_pdf_id}}',
            '{{%admission_pdf}}',
            'ref_sort_order_id'
        );

        // add foreign key for table `{{%ref_sort_order}}`
        $this->addForeignKey(
            '{{%fk-admission_pdf-ref_sort_order_admission_pdf_id}}',
            '{{%admission_pdf}}',
            'ref_sort_order_id',
            '{{%ref_sort_order_admission_pdf}}',
            'id',
            'CASCADE'
        );

        // creates index for column `skill_level`
        $this->createIndex(
            '{{%idx-admission_pdf-skill_level}}',
            '{{%admission_pdf}}',
            'skill_level_id'
        );

        // add foreign key for table `{{%skill_level}}`
        $this->addForeignKey(
            '{{%fk-admission_pdf-skill_level}}',
            '{{%admission_pdf}}',
            'skill_level_id',
            '{{%skill_level}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%ref_sort_order}}`
        $this->dropForeignKey(
            '{{%fk-admission_pdf-ref_sort_order_admission_pdf_id}}',
            '{{%admission_pdf}}'
        );

        // drops index for column `ref_sort_order_id`
        $this->dropIndex(
            '{{%idx-admission_pdf-ref_sort_order_admission_pdf_id}}',
            '{{%admission_pdf}}'
        );

        // drops foreign key for table `{{%skill_level}}`
        $this->dropForeignKey(
            '{{%fk-admission_pdf-skill_level}}',
            '{{%admission_pdf}}'
        );

        // drops index for column `skill_level`
        $this->dropIndex(
            '{{%idx-admission_pdf-skill_level}}',
            '{{%admission_pdf}}'
        );

        $this->dropTable('{{%admission_pdf}}');
    }
}
