<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%dissertation_advice}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%faculty}}`
 */
class m250818_101723_create_dissertation_advice_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%dissertation_advice}}', [
            'id' => $this->primaryKey(),
            'name' => $this->text(),
            'faculty_id' => $this->integer(),
        ]);

        // creates index for column `faculty_id`
        $this->createIndex(
            '{{%idx-dissertation_advice-faculty_id}}',
            '{{%dissertation_advice}}',
            'faculty_id'
        );

        // add foreign key for table `{{%faculty}}`
        $this->addForeignKey(
            '{{%fk-dissertation_advice-faculty_id}}',
            '{{%dissertation_advice}}',
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
            '{{%fk-dissertation_advice-faculty_id}}',
            '{{%dissertation_advice}}'
        );

        // drops index for column `faculty_id`
        $this->dropIndex(
            '{{%idx-dissertation_advice-faculty_id}}',
            '{{%dissertation_advice}}'
        );

        $this->dropTable('{{%dissertation_advice}}');
    }
}
