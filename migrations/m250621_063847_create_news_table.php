<?php

use yii\db\Migration;
use yii\db\Schema;
/**
 * Handles the creation of table `{{%news}}`.
 */
class m250621_063847_create_news_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%news}}', [
            'id' => $this->primaryKey(),
            'title_kz' => $this->text(),
            'title_ru' => $this->text(),
            'title_en' => $this->text(),
            'content_kz' => $this->getDb()->getSchema()->createColumnSchemaBuilder('mediumtext'),
            'content_ru' => $this->getDb()->getSchema()->createColumnSchemaBuilder('mediumtext'),
            'content_en' => $this->getDb()->getSchema()->createColumnSchemaBuilder('mediumtext'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%news}}');
    }
}
