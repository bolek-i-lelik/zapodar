<?php

use yii\db\Migration;

/**
 * Handles the creation of table `question`.
 */
class m161026_225337_create_question_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('question', [
            'id' => $this->primaryKey(),
            'familie' =>$this->string()->notNull(),
            'name' => $this->string()->notNull(),
            'father' => $this->string()->notNull(),
            'email' => $this->string()->notNull(),
            'adress' => $this->string(),
            'company' => $this->string(),
            'dolgnost' => $this->string(),
            'text' => $this->text()->notNull(),
            'date' => $this->timestamp(),
            'sost' => $this->integer(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('question');
    }
}
