<?php

use yii\db\Migration;

/**
 * Handles the creation for table `articles`.
 */
class m161004_202118_create_articles_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('articles', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'title' => $this->string()->notNull(),
            'description' => $this->string()->notNull(),
            'keywords' => $this->string()->notNull(),
            'alias' => $this->string()->notNull(),
            'created_at' => $this->timestamp()->notNull(),

        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('articles');
    }
}
