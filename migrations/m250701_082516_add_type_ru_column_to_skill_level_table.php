<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%skill_level}}`.
 */
class m250701_082516_add_type_ru_column_to_skill_level_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%skill_level}}', 'type_ru', $this->text());
        $this->addColumn('{{%skill_level}}', 'type_kz', $this->text());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%skill_level}}', 'type_ru');
        $this->dropColumn('{{%skill_level}}', 'type_kz');
    }
}
