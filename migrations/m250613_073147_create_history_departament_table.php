<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%history_departament}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%departament}}`
 */
class m250613_073147_create_history_departament_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%history_departament}}', [
            'id' => $this->primaryKey(),
            'title_kz' => $this->text(),
            'title_ru' => $this->text(),
            'title_en' => $this->text(),
            'content_kz' => $this->text(),
            'content_ru' => $this->text(),
            'content_en' => $this->text(),
            'departament_id' => $this->integer(),
        ]);

        // creates index for column `departament_id`
        $this->createIndex(
            '{{%idx-history_departament-departament_id}}',
            '{{%history_departament}}',
            'departament_id'
        );

        // add foreign key for table `{{%departament}}`
        $this->addForeignKey(
            '{{%fk-history_departament-departament_id}}',
            '{{%history_departament}}',
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
        // drops foreign key for table `{{%departament}}`
        $this->dropForeignKey(
            '{{%fk-history_departament-departament_id}}',
            '{{%history_departament}}'
        );

        // drops index for column `departament_id`
        $this->dropIndex(
            '{{%idx-history_departament-departament_id}}',
            '{{%history_departament}}'
        );

        $this->dropTable('{{%history_departament}}');
    }
}
