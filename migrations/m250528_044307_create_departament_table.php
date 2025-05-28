<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%departament}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%faculty}}`
 */
class m250528_044307_create_departament_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%departament}}', [
            'id' => $this->primaryKey(),
            'name_kz' => $this->string(255),
            'name_ru' => $this->string(255),
            'name_en' => $this->string(255),
            'information_kz' => $this->text(),
            'information_ru' => $this->text(),
            'information_en' => $this->text(),
            'welcome_kz' => $this->text(),
            'welcome_ru' => $this->text(),
            'welcome_en' => $this->text(),
            'faculty_id' => $this->integer(),
        ]);

        // creates index for column `faculty_id`
        $this->createIndex(
            '{{%idx-departament-faculty_id}}',
            '{{%departament}}',
            'faculty_id'
        );

        // add foreign key for table `{{%faculty}}`
        $this->addForeignKey(
            '{{%fk-departament-faculty_id}}',
            '{{%departament}}',
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
            '{{%fk-departament-faculty_id}}',
            '{{%departament}}'
        );

        // drops index for column `faculty_id`
        $this->dropIndex(
            '{{%idx-departament-faculty_id}}',
            '{{%departament}}'
        );

        $this->dropTable('{{%departament}}');
    }
}
