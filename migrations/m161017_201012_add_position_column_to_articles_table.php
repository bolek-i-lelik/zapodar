<?php

use yii\db\Migration;

/**
 * Handles adding position to table `articles`.
 */
class m161017_201012_add_position_column_to_articles_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('articles', 'text', $this->text());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('articles', 'text');
    }
}
