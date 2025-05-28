<?php

use yii\db\Migration;

class m250527_113031_add_column_faculty_id_to_staff_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m250527_113031_add_column_faculty_id_to_staff_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250527_113031_add_column_faculty_id_to_staff_table cannot be reverted.\n";

        return false;
    }
    */
}
