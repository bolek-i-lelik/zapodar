<?php

use yii\db\Migration;

/**
 * Handles dropping position from table `category`.
 */
class m170319_164147_drop_position_column_from_category_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {

        $this->dropColumn('category', 'text');

    }

    /**
     * @inheritdoc
     */
    public function down()
    {
    }
}
