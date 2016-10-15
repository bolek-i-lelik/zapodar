<?php

use yii\db\Migration;

/**
 * Handles dropping position from table `products`.
 */
class m161013_203256_drop_position_column_from_products_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->dropColumn('products', 'keywords');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
    }
}
