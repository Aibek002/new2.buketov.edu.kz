<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%image_article}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 * - `{{%ref_article}}`
 */
class m250707_060527_create_image_article_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%image_article}}', [
            'id' => $this->primaryKey(),
            'image' => $this->text(),
            'author' => $this->integer(),
            'ref_article_id' => $this->integer(),
        ]);

        // creates index for column `author`
        $this->createIndex(
            '{{%idx-image_article-author}}',
            '{{%image_article}}',
            'author'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-image_article-author}}',
            '{{%image_article}}',
            'author',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `ref_article_id`
        $this->createIndex(
            '{{%idx-image_article-ref_article_id}}',
            '{{%image_article}}',
            'ref_article_id'
        );

        // add foreign key for table `{{%ref_article}}`
        $this->addForeignKey(
            '{{%fk-image_article-ref_article_id}}',
            '{{%image_article}}',
            'ref_article_id',
            '{{%ref_article}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-image_article-author}}',
            '{{%image_article}}'
        );

        // drops index for column `author`
        $this->dropIndex(
            '{{%idx-image_article-author}}',
            '{{%image_article}}'
        );

        // drops foreign key for table `{{%ref_article}}`
        $this->dropForeignKey(
            '{{%fk-image_article-ref_article_id}}',
            '{{%image_article}}'
        );

        // drops index for column `ref_article_id`
        $this->dropIndex(
            '{{%idx-image_article-ref_article_id}}',
            '{{%image_article}}'
        );

        $this->dropTable('{{%image_article}}');
    }
}
