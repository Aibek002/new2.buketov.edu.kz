<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%staff}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%ref_staff}}`
 * - `{{%faculty}}`
 * - `{{%departament}}`
 */
class m250528_044358_create_staff_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%staff}}', [
            'id' => $this->primaryKey(),
            'ref_staff_id' => $this->integer()->notNull(),
            'surname_kz' => $this->string(255),
            'surname_ru' => $this->string(255),
            'surname_en' => $this->string(255),
            'name_kz' => $this->string(255),
            'name_ru' => $this->string(255),
            'name_en' => $this->string(255),
            'patronymic_kz' => $this->string(255),
            'patronymic_ru' => $this->string(255),
            'patronymic_en' => $this->string(255),
            'information_kz' => $this->text(),
            'information_ru' => $this->text(),
            'information_en' => $this->text(),
            'email' => $this->text(),
            'phone' => $this->text(),
            'faculty_id' => $this->integer(),
            'departament_id' => $this->integer(),
        ]);

        // creates index for column `ref_staff_id`
        $this->createIndex(
            '{{%idx-staff-ref_staff_id}}',
            '{{%staff}}',
            'ref_staff_id'
        );

        // add foreign key for table `{{%ref_staff}}`
        $this->addForeignKey(
            '{{%fk-staff-ref_staff_id}}',
            '{{%staff}}',
            'ref_staff_id',
            '{{%ref_staff}}',
            'id',
            'CASCADE'
        );

        // creates index for column `faculty_id`
        $this->createIndex(
            '{{%idx-staff-faculty_id}}',
            '{{%staff}}',
            'faculty_id'
        );

        // add foreign key for table `{{%faculty}}`
        $this->addForeignKey(
            '{{%fk-staff-faculty_id}}',
            '{{%staff}}',
            'faculty_id',
            '{{%faculty}}',
            'id',
            'CASCADE'
        );

        // creates index for column `departament_id`
        $this->createIndex(
            '{{%idx-staff-departament_id}}',
            '{{%staff}}',
            'departament_id'
        );

        // add foreign key for table `{{%departament}}`
        $this->addForeignKey(
            '{{%fk-staff-departament_id}}',
            '{{%staff}}',
            'departament_id',
            '{{%departament}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%ref_staff}}`
        $this->dropForeignKey(
            '{{%fk-staff-ref_staff_id}}',
            '{{%staff}}'
        );

        // drops index for column `ref_staff_id`
        $this->dropIndex(
            '{{%idx-staff-ref_staff_id}}',
            '{{%staff}}'
        );

        // drops foreign key for table `{{%faculty}}`
        $this->dropForeignKey(
            '{{%fk-staff-faculty_id}}',
            '{{%staff}}'
        );

        // drops index for column `faculty_id`
        $this->dropIndex(
            '{{%idx-staff-faculty_id}}',
            '{{%staff}}'
        );

        // drops foreign key for table `{{%departament}}`
        $this->dropForeignKey(
            '{{%fk-staff-departament_id}}',
            '{{%staff}}'
        );

        // drops index for column `departament_id`
        $this->dropIndex(
            '{{%idx-staff-departament_id}}',
            '{{%staff}}'
        );

        $this->dropTable('{{%staff}}');
    }
}
