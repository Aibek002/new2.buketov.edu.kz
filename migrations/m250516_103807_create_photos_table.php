<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%photos}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%ref_photos}}`
 */
class m250516_103807_create_photos_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%photos}}', [
            'id' => $this->primaryKey(),
            'path' => $this->text()->notNull(),
            'ref_photos_id' => $this->integer(),
            'link_id' => $this->integer(),
        ]);

        // creates index for column `ref_photos_id`
        $this->createIndex(
            '{{%idx-photos-ref_photos_id}}',
            '{{%photos}}',
            'ref_photos_id'
        );

        // add foreign key for table `{{%ref_photos}}`
        $this->addForeignKey(
            '{{%fk-photos-ref_photos_id}}',
            '{{%photos}}',
            'ref_photos_id',
            '{{%ref_photos}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%ref_photos}}`
        $this->dropForeignKey(
            '{{%fk-photos-ref_photos_id}}',
            '{{%photos}}'
        );

        // drops index for column `ref_photos_id`
        $this->dropIndex(
            '{{%idx-photos-ref_photos_id}}',
            '{{%photos}}'
        );

        $this->dropTable('{{%photos}}');
    }
}
