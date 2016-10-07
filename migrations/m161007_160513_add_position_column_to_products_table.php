<?php

use yii\db\Migration;

/**
 * Handles adding position to table `products`.
 */
class m161007_160513_add_position_column_to_products_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('products', 'vendorcode', $this->integer());
        $this->addColumn('products', 'vendor', $this->string());
        $this->addColumn('products', 'country', $this->string());    
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
    }
}
