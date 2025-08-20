<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%files}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%applicant_for_academic_titles}}`
 */
class m250820_061110_add_professor_id_column_to_files_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%files}}', 'professor_id', $this->integer());

        // creates index for column `professor_id`
        $this->createIndex(
            '{{%idx-files-professor_id}}',
            '{{%files}}',
            'professor_id'
        );

        // add foreign key for table `{{%applicant_for_academic_titles}}`
        $this->addForeignKey(
            '{{%fk-files-professor_id}}',
            '{{%files}}',
            'professor_id',
            '{{%applicant_for_academic_titles}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%applicant_for_academic_titles}}`
        $this->dropForeignKey(
            '{{%fk-files-professor_id}}',
            '{{%files}}'
        );

        // drops index for column `professor_id`
        $this->dropIndex(
            '{{%idx-files-professor_id}}',
            '{{%files}}'
        );

        $this->dropColumn('{{%files}}', 'professor_id');
    }
}
