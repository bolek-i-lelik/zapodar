<?php

use yii\db\Migration;

/**
 * Handles the creation of table `config`.
 */
class m161026_003105_create_config_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('config', [
            'id' => $this->primaryKey(),
            'upoloadfoto'=> $this->integer(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('config');
    }
}
