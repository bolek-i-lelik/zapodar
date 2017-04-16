<?php

use yii\db\Migration;

/**
 * Handles adding position to table `post`.
 */
class m170319_164207_add_position_column_to_post_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {

        $this->addColumn('category', 'text', $this->string(10000));

    }

    /**
     * @inheritdoc
     */
    public function down()
    {
    }
}
