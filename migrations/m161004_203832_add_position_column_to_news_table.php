<?php

use yii\db\Migration;

/**
 * Handles adding position to table `news`.
 */
class m161004_203832_add_position_column_to_news_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('news', 'alias', $this->string()->notNull());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('news', 'alias');
    }
}
