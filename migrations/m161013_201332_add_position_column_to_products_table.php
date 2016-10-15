<?php

use yii\db\Migration;

/**
 * Handles adding position to table `products`.
 */
class m161013_201332_add_position_column_to_products_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('products', 'keywords', $this->string());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
    }
}
