<?php

use yii\db\Migration;

/**
 * Handles adding position to table `products`.
 */
class m161007_155253_add_position_column_to_products_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('products', 'available', $this->string()->notNull());
        $this->addColumn('products', 'productsid', $this->integer()->notNull());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
    }
}
