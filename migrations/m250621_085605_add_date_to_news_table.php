<?php

use yii\db\Migration;

class m250621_085605_add_date_to_news_table extends Migration
{
    /**
     * {@inheritdoc}
     */
   public function safeUp()
{
    $this->addColumn('news', 'date', $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'));
}

public function safeDown()
{
    $this->dropColumn('news', 'date');
}


    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250621_085605_add_date_to_news_table cannot be reverted.\n";

        return false;
    }
    */
}
