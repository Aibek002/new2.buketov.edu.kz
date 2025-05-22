<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%departaments}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%faculties}}`
 */
class m250516_102327_create_departaments_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%departaments}}', [
            'id' => $this->primaryKey(),
            'name' => $this->text()->notNull(),
            'information' => $this->text()->notNull(),
            'faculty_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `faculties_id`
        $this->createIndex(
            '{{%idx-departaments-faculty_id}}',
            '{{%departaments}}',
            'faculty_id'
        );

        // add foreign key for table `{{%faculties}}`
        $this->addForeignKey(
            '{{%fk-departaments-faculty_id}}',
            '{{%departaments}}',
            'faculty_id',
            '{{%faculty}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%faculties}}`
        $this->dropForeignKey(
            '{{%fk-departaments-faculty_id}}',
            '{{%departaments}}'
        );

        // drops index for column `faculties_id`
        $this->dropIndex(
            '{{%idx-departaments-faculty_id}}',
            '{{%departaments}}'
        );

        $this->dropTable('{{%departaments}}');
    }
}
