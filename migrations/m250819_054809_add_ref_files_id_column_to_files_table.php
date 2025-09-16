<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%files}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%ref_files}}`
 */
class m250819_054809_add_ref_files_id_column_to_files_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%files}}', 'ref_files_id', $this->integer()->null());

        // creates index for column `ref_files_id`
        $this->createIndex(
            '{{%idx-files-ref_files_id}}',
            '{{%files}}',
            'ref_files_id'
        );

        // add foreign key for table `{{%ref_files}}`
        $this->addForeignKey(
            '{{%fk-files-ref_files_id}}',
            '{{%files}}',
            'ref_files_id',
            '{{%ref_files}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%ref_files}}`
        $this->dropForeignKey(
            '{{%fk-files-ref_files_id}}',
            '{{%files}}'
        );

        // drops index for column `ref_files_id`
        $this->dropIndex(
            '{{%idx-files-ref_files_id}}',
            '{{%files}}'
        );

        $this->dropColumn('{{%files}}', 'ref_files_id');
    }
}
