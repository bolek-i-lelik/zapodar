<?php

use yii\db\Migration;

/**
 * Handles adding position to table `zakaz`.
 */
class m161026_191450_add_position_column_to_zakaz_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('zakaz', 'user_id', $this->integer());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('zakaz', 'user_id');
    }
}
