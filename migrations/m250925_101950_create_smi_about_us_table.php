<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%smi_about_us}}`.
 */
class m250925_101950_create_smi_about_us_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%smi_about_us}}', [
            'id' => $this->primaryKey(),
            'title_kz' => $this->text(),
            'title_ru' => $this->text(),
            'title_en' => $this->text(),
            'content_kz' => $this->text(),
            'content_ru' => $this->text(),
            'content_en' => $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%smi_about_us}}');
    }
}
