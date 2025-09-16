<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%files}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%dissertation_advice}}`
 */
class m250819_065916_add_dissertation_advice_id_column_to_files_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%files}}', 'dissertation_advice_id', $this->integer());

        // creates index for column `dissertation_advice_id`
        $this->createIndex(
            '{{%idx-files-dissertation_advice_id}}',
            '{{%files}}',
            'dissertation_advice_id'
        );

        // add foreign key for table `{{%dissertation_advice}}`
        $this->addForeignKey(
            '{{%fk-files-dissertation_advice_id}}',
            '{{%files}}',
            'dissertation_advice_id',
            '{{%dissertation_advice}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%dissertation_advice}}`
        $this->dropForeignKey(
            '{{%fk-files-dissertation_advice_id}}',
            '{{%files}}'
        );

        // drops index for column `dissertation_advice_id`
        $this->dropIndex(
            '{{%idx-files-dissertation_advice_id}}',
            '{{%files}}'
        );

        $this->dropColumn('{{%files}}', 'dissertation_advice_id');
    }
}
