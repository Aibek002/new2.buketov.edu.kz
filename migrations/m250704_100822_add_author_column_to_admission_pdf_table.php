<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%admission_pdf}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 */
class m250704_100822_add_author_column_to_admission_pdf_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%admission_pdf}}', 'author', $this->integer());

        // creates index for column `author`
        $this->createIndex(
            '{{%idx-admission_pdf-author}}',
            '{{%admission_pdf}}',
            'author'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-admission_pdf-author}}',
            '{{%admission_pdf}}',
            'author',
            '{{%user}}',
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
            '{{%fk-admission_pdf-author}}',
            '{{%admission_pdf}}'
        );

        // drops index for column `author`
        $this->dropIndex(
            '{{%idx-admission_pdf-author}}',
            '{{%admission_pdf}}'
        );

        $this->dropColumn('{{%admission_pdf}}', 'author');
    }
}
