<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%articles}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%ref_articles}}`
 */
class m250516_103307_create_articles_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%articles}}', [
            'id' => $this->primaryKey(),
            'ref_articles_id' => $this->integer()->notNull(),
            'title' => $this->text(),
            'description' => $this->text(),
        ]);

        // creates index for column `ref_articles_id`
        $this->createIndex(
            '{{%idx-articles-ref_articles_id}}',
            '{{%articles}}',
            'ref_articles_id'
        );

        // add foreign key for table `{{%ref_articles}}`
        $this->addForeignKey(
            '{{%fk-articles-ref_articles_id}}',
            '{{%articles}}',
            'ref_articles_id',
            '{{%ref_articles}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%ref_articles}}`
        $this->dropForeignKey(
            '{{%fk-articles-ref_articles_id}}',
            '{{%articles}}'
        );

        // drops index for column `ref_articles_id`
        $this->dropIndex(
            '{{%idx-articles-ref_articles_id}}',
            '{{%articles}}'
        );

        $this->dropTable('{{%articles}}');
    }
}
