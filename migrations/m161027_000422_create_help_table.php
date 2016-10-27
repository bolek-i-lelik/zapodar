<?php

use yii\db\Migration;

/**
 * Handles the creation of table `help`.
 */
class m161027_000422_create_help_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('help', [
            'id' => $this->primaryKey(),
            'vopros' => $this->text(),
            'otvet' => $this->text(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('help');
    }
}
