<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%history_faculty}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%faculty}}`
 */
class m250611_052500_create_history_faculty_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%history_faculty}}', [
            'id' => $this->primaryKey(),
            'title_kz' => $this->text(),
            'title_ru' => $this->text(),
            'title_en' => $this->text(),
            'content_kz' => $this->text(),
            'content_ru' => $this->text(),
            'content_en' => $this->text(),
            'faculty_id' => $this->integer(),
        ]);

        // creates index for column `faculty_id`
        $this->createIndex(
            '{{%idx-history_faculty-faculty_id}}',
            '{{%history_faculty}}',
            'faculty_id'
        );

        // add foreign key for table `{{%faculty}}`
        $this->addForeignKey(
            '{{%fk-history_faculty-faculty_id}}',
            '{{%history_faculty}}',
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
        // drops foreign key for table `{{%faculty}}`
        $this->dropForeignKey(
            '{{%fk-history_faculty-faculty_id}}',
            '{{%history_faculty}}'
        );

        // drops index for column `faculty_id`
        $this->dropIndex(
            '{{%idx-history_faculty-faculty_id}}',
            '{{%history_faculty}}'
        );

        $this->dropTable('{{%history_faculty}}');
    }
}
