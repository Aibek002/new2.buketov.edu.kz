<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%image}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%id}}`
 */
class m250630_063020_create_image_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%image}}', [
            'id' => $this->primaryKey(),
            'ref_image_id' => $this->integer(),
            'column_id' => $this->integer(),
            'image' => $this->text(),
            'sort_order' => $this->integer(),
        ]);

        // creates index for column `ref_image_id`
        $this->createIndex(
            '{{%idx-image-ref_image_id}}',
            '{{%image}}',
            'ref_image_id'
        );

        // add foreign key for table `{{%id}}`
        $this->addForeignKey(
            '{{%fk-image-ref_image_id}}',
            '{{%image}}',
            'ref_image_id',
            '{{%ref_image}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%id}}`
        $this->dropForeignKey(
            '{{%fk-image-ref_image_id}}',
            '{{%image}}'
        );

        // drops index for column `ref_image_id`
        $this->dropIndex(
            '{{%idx-image-ref_image_id}}',
            '{{%image}}'
        );

        $this->dropTable('{{%image}}');
    }
}
