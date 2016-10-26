<?php

use yii\db\Migration;

/**
 * Handles adding position to table `messages`.
 */
class m161026_001117_add_position_column_to_messages_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('messages', 'sost', $this->integer());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('messages', 'sost');
    }
}
