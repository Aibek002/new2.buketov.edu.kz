<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%staff}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%ref_staff}}`
 */
class m250516_093937_create_staff_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%staff}}', [
            'id' => $this->primaryKey(),
            'name' => $this->text()->notNull(),
            'surname' => $this->text()->notNull(),
            'patronymic' => $this->text()->notNull(),
            'ref_staff_id' => $this->integer()->notNull(),
            'short_information' => $this->text(),
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

        $this->dropTable('{{%staff}}');
    }
}
