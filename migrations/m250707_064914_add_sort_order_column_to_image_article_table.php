<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%image_article}}`.
 */
class m250707_064914_add_sort_order_column_to_image_article_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%image_article}}', 'sort_order', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%image_article}}', 'sort_order');
    }
}
