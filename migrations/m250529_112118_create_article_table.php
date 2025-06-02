<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%article}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%ref_article}}`
 */
class m250529_112118_create_article_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%article}}', [
            'id' => $this->primaryKey(),
            'ref_article_id' => $this->integer(),
            'title_kz' => $this->text(),
            'title_ru' => $this->text(),
            'title_en' => $this->text(),
            'content_kz' => $this->text(),
            'content_ru' => $this->text(),
            'content_en' => $this->text(),
        ]);

        // creates index for column `ref_article_id`
        $this->createIndex(
            '{{%idx-article-ref_article_id}}',
            '{{%article}}',
            'ref_article_id'
        );

        // add foreign key for table `{{%ref_article}}`
        $this->addForeignKey(
            '{{%fk-article-ref_article_id}}',
            '{{%article}}',
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
        // drops foreign key for table `{{%ref_article}}`
        $this->dropForeignKey(
            '{{%fk-article-ref_article_id}}',
            '{{%article}}'
        );

        // drops index for column `ref_article_id`
        $this->dropIndex(
            '{{%idx-article-ref_article_id}}',
            '{{%article}}'
        );

        $this->dropTable('{{%article}}');
    }
}
