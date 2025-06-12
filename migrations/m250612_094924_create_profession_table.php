<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%profession}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%skill_level}}`
 * - `{{%ref_type_profession}}`
 */
class m250612_094924_create_profession_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%profession}}', [
            'id' => $this->primaryKey(),
            'special_code' => $this->text(),

            'name_kz' => $this->text(),
            'name_ru' => $this->text(),
            'name_en' => $this->text(),
            'semi_passing_points' => $this->integer(),
            'passing_points' => $this->integer(),
            'skill_level_id' => $this->integer(),
            'ref_type_profession_id' => $this->integer(),
        ]);

        // creates index for column `skill_level_id`
        $this->createIndex(
            '{{%idx-profession-skill_level_id}}',
            '{{%profession}}',
            'skill_level_id'
        );

        // add foreign key for table `{{%skill_level}}`
        $this->addForeignKey(
            '{{%fk-profession-skill_level_id}}',
            '{{%profession}}',
            'skill_level_id',
            '{{%skill_level}}',
            'id',
            'CASCADE'
        );

        // creates index for column `ref_type_profession_id`
        $this->createIndex(
            '{{%idx-profession-ref_type_profession_id}}',
            '{{%profession}}',
            'ref_type_profession_id'
        );

        // add foreign key for table `{{%ref_type_profession}}`
        $this->addForeignKey(
            '{{%fk-profession-ref_type_profession_id}}',
            '{{%profession}}',
            'ref_type_profession_id',
            '{{%ref_type_profession}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%skill_level}}`
        $this->dropForeignKey(
            '{{%fk-profession-skill_level_id}}',
            '{{%profession}}'
        );

        // drops index for column `skill_level_id`
        $this->dropIndex(
            '{{%idx-profession-skill_level_id}}',
            '{{%profession}}'
        );

        // drops foreign key for table `{{%ref_type_profession}}`
        $this->dropForeignKey(
            '{{%fk-profession-ref_type_profession_id}}',
            '{{%profession}}'
        );

        // drops index for column `ref_type_profession_id`
        $this->dropIndex(
            '{{%idx-profession-ref_type_profession_id}}',
            '{{%profession}}'
        );

        $this->dropTable('{{%profession}}');
    }
}
