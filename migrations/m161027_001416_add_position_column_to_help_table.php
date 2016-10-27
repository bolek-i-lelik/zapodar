<?php

use yii\db\Migration;

/**
 * Handles adding position to table `help`.
 */
class m161027_001416_add_position_column_to_help_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('help', 'pokaz', $this->integer());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('help', 'pokaz');
    }
}
