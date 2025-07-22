<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%corp_sole_shareholder}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 */
class m250722_071520_create_corp_sole_shareholder_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%corp_sole_shareholder}}', [
            'id' => $this->primaryKey(),
            'year' => $this->integer()->notNull(),
            'name_pdf' => $this->text()->notNull(),
            'lang' => $this->string(50)->notNull(),
            'author' => $this->integer(),
            'date' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
        ]);

        // creates index for column `author`
        $this->createIndex(
            '{{%idx-corp_sole_shareholder-author}}',
            '{{%corp_sole_shareholder}}',
            'author'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-corp_sole_shareholder-author}}',
            '{{%corp_sole_shareholder}}',
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
            '{{%fk-corp_sole_shareholder-author}}',
            '{{%corp_sole_shareholder}}'
        );

        // drops index for column `author`
        $this->dropIndex(
            '{{%idx-corp_sole_shareholder-author}}',
            '{{%corp_sole_shareholder}}'
        );

        $this->dropTable('{{%corp_sole_shareholder}}');
    }
}
