<?php

use yii\db\Migration;

/**
 * Handles adding position to table `product`.
 */
class m170121_131602_add_position_column_to_product_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('products', 'updated_at', $this->integer());
        $this->addColumn('products', 'created_at', $this->timestamp());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
    }
}
