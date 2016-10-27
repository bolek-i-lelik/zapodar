<?php

use yii\db\Migration;

/**
 * Handles the creation of table `zakaz`.
 */
class m161026_190634_create_zakaz_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('zakaz', [
            'id' => $this->primaryKey(),
            'sost' => $this->integer(),
            'date' => $this->timestamp(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('zakaz');
    }
}
