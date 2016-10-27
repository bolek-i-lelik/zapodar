<?php

use yii\db\Migration;

/**
 * Handles the creation of table `statistic`.
 */
class m161027_013646_create_statistic_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('statistic', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'text' => $this->text(),
            'pokaz' => $this->integer(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('statistic');
    }
}
