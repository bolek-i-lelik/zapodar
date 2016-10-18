<?php

use yii\db\Migration;

/**
 * Handles adding position to table `articles`.
 */
class m161017_195634_add_position_column_to_articles_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('articles', 'ishome', $this->integer());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('articles', 'ishome');
    }
}
