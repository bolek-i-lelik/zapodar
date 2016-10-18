<?php

use yii\db\Migration;

/**
 * Handles the creation for table `basket`.
 */
class m161017_224205_create_basket_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('basket', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'product_id' => $this->integer(),
            'count' => $this->integer(),
            'buy' => $this->integer(),
            'date' => $this->timestamp(),
            'sost' => $this->string(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('basket');
    }
}
