<?php

use yii\db\Migration;

/**
 * Handles adding position to table `user`.
 */
class m161022_135855_add_position_column_to_user_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('user', 'secret_key', $this->string());
        $this->addColumn('user', 'date_valid_secret_key', $this->string());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
    }
}
