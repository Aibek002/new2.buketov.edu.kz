<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%subject_to_profession}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%subject}}`
 * - `{{%profession}}`
 */
class m250612_095850_create_subject_to_profession_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%subject_to_profession}}', [
            'id' => $this->primaryKey(),
            'subject_id' => $this->integer(),
            'profession_id' => $this->integer(),
        ]);

        // creates index for column `subject_id`
        $this->createIndex(
            '{{%idx-subject_to_profession-subject_id}}',
            '{{%subject_to_profession}}',
            'subject_id'
        );

        // add foreign key for table `{{%subject}}`
        $this->addForeignKey(
            '{{%fk-subject_to_profession-subject_id}}',
            '{{%subject_to_profession}}',
            'subject_id',
            '{{%subject}}',
            'id',
            'CASCADE'
        );

        // creates index for column `profession_id`
        $this->createIndex(
            '{{%idx-subject_to_profession-profession_id}}',
            '{{%subject_to_profession}}',
            'profession_id'
        );

        // add foreign key for table `{{%profession}}`
        $this->addForeignKey(
            '{{%fk-subject_to_profession-profession_id}}',
            '{{%subject_to_profession}}',
            'profession_id',
            '{{%profession}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%subject}}`
        $this->dropForeignKey(
            '{{%fk-subject_to_profession-subject_id}}',
            '{{%subject_to_profession}}'
        );

        // drops index for column `subject_id`
        $this->dropIndex(
            '{{%idx-subject_to_profession-subject_id}}',
            '{{%subject_to_profession}}'
        );

        // drops foreign key for table `{{%profession}}`
        $this->dropForeignKey(
            '{{%fk-subject_to_profession-profession_id}}',
            '{{%subject_to_profession}}'
        );

        // drops index for column `profession_id`
        $this->dropIndex(
            '{{%idx-subject_to_profession-profession_id}}',
            '{{%subject_to_profession}}'
        );

        $this->dropTable('{{%subject_to_profession}}');
    }
}
