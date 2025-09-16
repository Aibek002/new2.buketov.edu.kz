<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%type_ref_staff}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%staff}}`
 * - `{{%refstaff}}`
 */
class m250822_063455_create_type_ref_staff_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%type_ref_staff}}', [
            'id' => $this->primaryKey(),
            'job_title_kz' => $this->text(),
            'job_title_ru' => $this->text(),
            'job_title_en' => $this->text(),
            'date' => $this->text(),
            'staff_id' => $this->integer(),
            'ref_staff_id' => $this->integer(),
        ]);

        // creates index for column `staff_id`
        $this->createIndex(
            '{{%idx-type_ref_staff-staff_id}}',
            '{{%type_ref_staff}}',
            'staff_id'
        );

        // add foreign key for table `{{%staff}}`
        $this->addForeignKey(
            '{{%fk-type_ref_staff-staff_id}}',
            '{{%type_ref_staff}}',
            'staff_id',
            '{{%staff}}',
            'id',
            'CASCADE'
        );

        // creates index for column `ref_staff_id`
        $this->createIndex(
            '{{%idx-type_ref_staff-ref_staff_id}}',
            '{{%type_ref_staff}}',
            'ref_staff_id'
        );

        // add foreign key for table `{{%refstaff}}`
        $this->addForeignKey(
            '{{%fk-type_ref_staff-ref_staff_id}}',
            '{{%type_ref_staff}}',
            'ref_staff_id',
            '{{%ref_staff}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%staff}}`
        $this->dropForeignKey(
            '{{%fk-type_ref_staff-staff_id}}',
            '{{%type_ref_staff}}'
        );

        // drops index for column `staff_id`
        $this->dropIndex(
            '{{%idx-type_ref_staff-staff_id}}',
            '{{%type_ref_staff}}'
        );

        // drops foreign key for table `{{%refstaff}}`
        $this->dropForeignKey(
            '{{%fk-type_ref_staff-ref_staff_id}}',
            '{{%type_ref_staff}}'
        );

        // drops index for column `ref_staff_id`
        $this->dropIndex(
            '{{%idx-type_ref_staff-ref_staff_id}}',
            '{{%type_ref_staff}}'
        );

        $this->dropTable('{{%type_ref_staff}}');
    }
}
