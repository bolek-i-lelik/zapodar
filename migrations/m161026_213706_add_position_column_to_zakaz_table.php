<?php

use yii\db\Migration;

/**
 * Handles adding position to table `zakaz`.
 */
class m161026_213706_add_position_column_to_zakaz_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('zakaz', 'info', $this->text());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('zakaz', 'info');
    }
}
