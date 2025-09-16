<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%staff}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%dissertation_advice}}`
 */
class m250819_042428_add_dissertation_advice_id_column_to_staff_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%staff}}', 'dissertation_advice_id', $this->integer());

        // creates index for column `dissertation_advice_id`
        $this->createIndex(
            '{{%idx-staff-dissertation_advice_id}}',
            '{{%staff}}',
            'dissertation_advice_id'
        );

        // add foreign key for table `{{%dissertation_advice}}`
        $this->addForeignKey(
            '{{%fk-staff-dissertation_advice_id}}',
            '{{%staff}}',
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
            '{{%fk-staff-dissertation_advice_id}}',
            '{{%staff}}'
        );

        // drops index for column `dissertation_advice_id`
        $this->dropIndex(
            '{{%idx-staff-dissertation_advice_id}}',
            '{{%staff}}'
        );

        $this->dropColumn('{{%staff}}', 'full_name');
        $this->dropColumn('{{%staff}}', 'dissertation_advice_id');
    }
}
