<?php

use yii\db\Migration;

/**
 * Handles adding position to table `category`.
 */
class m170319_145744_add_position_column_to_category_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {

        $this->addColumn('category', 'deko_id', $this->integer());
        $this->addColumn('category', 'deko_parent', $this->integer());

    }

    /**
     * @inheritdoc
     */
    public function down()
    {
    }
}
