<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%corporate_governance_file}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%ref_corporate_governance}}`
 * - `{{%user}}`
 * - `{{%status}}`
 */
class m250803_063601_create_corporate_governance_file_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%corporate_governance_file}}', [
            'id' => $this->primaryKey(),
            'name_url' => $this->string(255)->notNull(),
            'path_file' => $this->text()->notNull(),
            'sort_id' => $this->text()->notNull(),
            'ref_corporate_governance' => $this->integer(),
            'author' => $this->integer(),
            'status' => $this->integer()->defaultValue(1),
            'date_create' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
        ]);

        // creates index for column `ref_corporate_governance`
        $this->createIndex(
            '{{%idx-corporate_governance_file-ref_corporate_governance}}',
            '{{%corporate_governance_file}}',
            'ref_corporate_governance'
        );

        // add foreign key for table `{{%ref_corporate_governance}}`
        $this->addForeignKey(
            '{{%fk-corporate_governance_file-ref_corporate_governance}}',
            '{{%corporate_governance_file}}',
            'ref_corporate_governance',
            '{{%ref_corporate_governance}}',
            'id',
            'CASCADE'
        );

        // creates index for column `author`
        $this->createIndex(
            '{{%idx-corporate_governance_file-author}}',
            '{{%corporate_governance_file}}',
            'author'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-corporate_governance_file-author}}',
            '{{%corporate_governance_file}}',
            'author',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `status`
        $this->createIndex(
            '{{%idx-corporate_governance_file-status}}',
            '{{%corporate_governance_file}}',
            'status'
        );

        // // add foreign key for table `{{%status}}`
        // $this->addForeignKey(
        //     '{{%fk-corporate_governance_file-status}}',
        //     '{{%corporate_governance_file}}',
        //     'status',
        //     '{{%status}}',
        //     'id',
        //     'CASCADE'
        // );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%ref_corporate_governance}}`
        $this->dropForeignKey(
            '{{%fk-corporate_governance_file-ref_corporate_governance}}',
            '{{%corporate_governance_file}}'
        );

        // drops index for column `ref_corporate_governance`
        $this->dropIndex(
            '{{%idx-corporate_governance_file-ref_corporate_governance}}',
            '{{%corporate_governance_file}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-corporate_governance_file-author}}',
            '{{%corporate_governance_file}}'
        );

        // drops index for column `author`
        $this->dropIndex(
            '{{%idx-corporate_governance_file-author}}',
            '{{%corporate_governance_file}}'
        );

        // // drops foreign key for table `{{%status}}`
        // $this->dropForeignKey(
        //     '{{%fk-corporate_governance_file-status}}',
        //     '{{%corporate_governance_file}}'
        // );

        // // drops index for column `status`
        // $this->dropIndex(
        //     '{{%idx-corporate_governance_file-status}}',
        //     '{{%corporate_governance_file}}'
        // );

        $this->dropTable('{{%corporate_governance_file}}');
    }
}
