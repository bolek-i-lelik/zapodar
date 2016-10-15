<?php

use yii\db\Migration;

/**
 * Handles adding position to table `products`.
 */
class m161013_203357_add_position_column_to_products_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('products', 'keywords', $this->string(1000));
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
    }
}
