<?php

use yii\db\Migration;

/**
 * Handles the creation for table `products`.
 */
class m161006_201937_create_products_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('products', [
            'id' => $this->string(),
            'alias' => $this->string(),
            'price' => $this->string(),
            'currencyid' => $this->string(),
            'categoryid' => $this->string(),
            'picture' => $this->string(),
            'pickup' => $this->boolean(),
            'delivery' => $this->boolean(),
            'name' => $this->string(),
            'description' => $this->text(),
            'sales_notes' => $this->string(),
            'group_id' => $this->string(),
            'params' => $this->string(1500),
            'prosmotr' => $this->integer(),
            'buy' => $this->integer(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('products');
    }
}
