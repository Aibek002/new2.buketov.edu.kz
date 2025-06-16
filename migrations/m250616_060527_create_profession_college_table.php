<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%profession_college}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%profession}}`
 */
class m250616_060527_create_profession_college_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%profession_college}}', [
            'id' => $this->primaryKey(),
            'name_kz' => $this->text(),
            'name_ru' => $this->text(),
            'name_en' => $this->text(),
            'profession_id' => $this->integer(),
            'special_code' => $this->text(),
        ]);

        // creates index for column `profession_id`
        $this->createIndex(
            '{{%idx-profession_college-profession_id}}',
            '{{%profession_college}}',
            'profession_id'
        );

        // add foreign key for table `{{%profession}}`
        $this->addForeignKey(
            '{{%fk-profession_college-profession_id}}',
            '{{%profession_college}}',
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
        // drops foreign key for table `{{%profession}}`
        $this->dropForeignKey(
            '{{%fk-profession_college-profession_id}}',
            '{{%profession_college}}'
        );

        // drops index for column `profession_id`
        $this->dropIndex(
            '{{%idx-profession_college-profession_id}}',
            '{{%profession_college}}'
        );

        $this->dropTable('{{%profession_college}}');
    }
}
