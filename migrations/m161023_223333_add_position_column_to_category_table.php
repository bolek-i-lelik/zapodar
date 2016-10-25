<?php

use yii\db\Migration;

/**
 * Handles adding position to table `category`.
 */
class m161023_223333_add_position_column_to_category_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('category', 'picture', $this->string());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('category', 'picture');
    }
}
