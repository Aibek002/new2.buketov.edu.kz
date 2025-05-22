<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%social}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%ref_social}}`
 * - `{{%type_social}}`
 */
class m250516_104835_create_social_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%social}}', [
            'id' => $this->primaryKey(),
            'ref_social_id' => $this->integer()->notNull(),
            'link_id' => $this->integer(),
            'type_social_id' => $this->integer()->notNull(),
            'info' => $this->text(),
        ]);

        // creates index for column `ref_social_id`
        $this->createIndex(
            '{{%idx-social-ref_social_id}}',
            '{{%social}}',
            'ref_social_id'
        );

        // add foreign key for table `{{%ref_social}}`
        $this->addForeignKey(
            '{{%fk-social-ref_social_id}}',
            '{{%social}}',
            'ref_social_id',
            '{{%ref_social}}',
            'id',
            'CASCADE'
        );

        // creates index for column `type_social_id`
        $this->createIndex(
            '{{%idx-social-type_social_id}}',
            '{{%social}}',
            'type_social_id'
        );

        // add foreign key for table `{{%type_social}}`
        $this->addForeignKey(
            '{{%fk-social-type_social_id}}',
            '{{%social}}',
            'type_social_id',
            '{{%type_social}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%ref_social}}`
        $this->dropForeignKey(
            '{{%fk-social-ref_social_id}}',
            '{{%social}}'
        );

        // drops index for column `ref_social_id`
        $this->dropIndex(
            '{{%idx-social-ref_social_id}}',
            '{{%social}}'
        );

        // drops foreign key for table `{{%type_social}}`
        $this->dropForeignKey(
            '{{%fk-social-type_social_id}}',
            '{{%social}}'
        );

        // drops index for column `type_social_id`
        $this->dropIndex(
            '{{%idx-social-type_social_id}}',
            '{{%social}}'
        );

        $this->dropTable('{{%social}}');
    }
}
