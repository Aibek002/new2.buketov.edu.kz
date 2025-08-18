<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%doctorant}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%dissertation_advice}}`
 * - `{{%staff}}`
 */
class m250818_103303_create_doctorant_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%doctorant}}', [
            'id' => $this->primaryKey(),
            'full_name_ru' => $this->text(),
            'full_name_kz' => $this->text(),
            'full_name_en' => $this->text(),
            'dissertation_id' => $this->integer(),
            'author' => $this->integer(),
        ]);

        // creates index for column `dissertation_id`
        $this->createIndex(
            '{{%idx-doctorant-dissertation_id}}',
            '{{%doctorant}}',
            'dissertation_id'
        );

        // add foreign key for table `{{%dissertation_advice}}`
        $this->addForeignKey(
            '{{%fk-doctorant-dissertation_id}}',
            '{{%doctorant}}',
            'dissertation_id',
            '{{%dissertation_advice}}',
            'id',
            'CASCADE'
        );

        // creates index for column `author`
        $this->createIndex(
            '{{%idx-doctorant-author}}',
            '{{%doctorant}}',
            'author'
        );

        // add foreign key for table `{{%staff}}`
        $this->addForeignKey(
            '{{%fk-doctorant-author}}',
            '{{%doctorant}}',
            'author',
            '{{%staff}}',
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
            '{{%fk-doctorant-dissertation_id}}',
            '{{%doctorant}}'
        );

        // drops index for column `dissertation_id`
        $this->dropIndex(
            '{{%idx-doctorant-dissertation_id}}',
            '{{%doctorant}}'
        );

        // drops foreign key for table `{{%staff}}`
        $this->dropForeignKey(
            '{{%fk-doctorant-author}}',
            '{{%doctorant}}'
        );

        // drops index for column `author`
        $this->dropIndex(
            '{{%idx-doctorant-author}}',
            '{{%doctorant}}'
        );

        $this->dropTable('{{%doctorant}}');
    }
}
