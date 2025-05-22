<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%staff}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%departaments}}`
 */
class m250516_102914_add_departaments_id_column_to_staff_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%staff}}', 'departament_id', $this->integer());

        // creates index for column `departament_id`
        $this->createIndex(
            '{{%idx-staff-departament_id}}',
            '{{%staff}}',
            'departament_id'
        );

        // add foreign key for table `{{%departaments}}`
        $this->addForeignKey(
            '{{%fk-staff-departament_id}}',
            '{{%staff}}',
            'departament_id',
            '{{%departaments}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%departaments}}`
        $this->dropForeignKey(
            '{{%fk-staff-departament_id}}',
            '{{%staff}}'
        );

        // drops index for column `departament_id`
        $this->dropIndex(
            '{{%idx-staff-departament_id}}',
            '{{%staff}}'
        );

        $this->dropColumn('{{%staff}}', 'departament_id');
    }
}
