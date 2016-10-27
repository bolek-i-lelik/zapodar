<?php

use yii\db\Migration;

/**
 * Handles adding position to table `basket`.
 */
class m161026_192438_add_position_column_to_basket_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('basket', 'zakaz_id', $this->integer());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('basket', 'zakaz_id');
    }
}
