<?php

use yii\db\Migration;
use yii\db\Expression;
/**
 * Handles the creation of table `{{%files}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%staff}}`
 * - `{{%user}}`
 */
class m250815_103835_create_files_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%files}}', [
            'id' => $this->primaryKey(),
            'path_file' => $this->text(),
            'staff_id' => $this->integer(),
            'status' => $this->integer()->defaultValue(1),
            'fileName' => $this->text(),
            'language_file' => $this->text(),
            'created_at' => $this->timestamp()->defaultExpression(new Expression('CURRENT_TIMESTAMP')),
            'updated_at' => $this->timestamp()->null(),
            'author' => $this->integer(),
        ]);

        // creates index for column `staff_id`
        $this->createIndex(
            '{{%idx-files-staff_id}}',
            '{{%files}}',
            'staff_id'
        );

        // add foreign key for table `{{%staff}}`
        $this->addForeignKey(
            '{{%fk-files-staff_id}}',
            '{{%files}}',
            'staff_id',
            '{{%staff}}',
            'id',
            'CASCADE'
        );

        // creates index for column `author`
        $this->createIndex(
            '{{%idx-files-author}}',
            '{{%files}}',
            'author'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-files-author}}',
            '{{%files}}',
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
        // drops foreign key for table `{{%staff}}`
        $this->dropForeignKey(
            '{{%fk-files-staff_id}}',
            '{{%files}}'
        );

        // drops index for column `staff_id`
        $this->dropIndex(
            '{{%idx-files-staff_id}}',
            '{{%files}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-files-author}}',
            '{{%files}}'
        );

        // drops index for column `author`
        $this->dropIndex(
            '{{%idx-files-author}}',
            '{{%files}}'
        );

        $this->dropTable('{{%files}}');
    }
}
