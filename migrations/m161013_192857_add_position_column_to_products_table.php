<?php

use yii\db\Migration;

/**
 * Handles adding position to table `products`.
 */
class m161013_192857_add_position_column_to_products_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('products', 'edinica', $this->string());
        $this->addColumn('products', 'nalichie', $this->string());
        $this->addColumn('products', 'count', $this->integer());
        $this->addColumn('products', 'podrazdelid', $this->integer());
        $this->addColumn('products', 'garantie', $this->string());
        $this->addColumn('products', 'sale', $this->string());
        $this->addColumn('products', 'group_raznovid_id', $this->integer());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
    }
}
