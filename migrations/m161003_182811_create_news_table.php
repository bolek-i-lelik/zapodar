<?php

use yii\db\Migration;

/**
 * Handles the creation for table `news`.
 */
class m161003_182811_create_news_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('news', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'name' => $this->string()->notNull(),
            'description' => $this->string()->notNull(),
            'keywords' => $this->string()->notNull(),
            'text' => $this->text(),
            'prev_text' => $this->string()->notNull(),
            'created_at' => $this->timestamp()->notNull(),
            'prosmotr' => $this->integer(),
            'prev_foto' => $this->string()->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('news');
    }
}
