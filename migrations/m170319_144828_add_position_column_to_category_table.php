<?php

use yii\db\Migration;

/**
 * Handles adding position to table `category`.
 */
class m170319_144828_add_position_column_to_category_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {

        $this->addColumn('category', 'meta_title', $this->string());
        $this->addColumn('category', 'meta_keywords', $this->string());
        $this->addColumn('category', 'meta_description', $this->string());
        $this->addColumn('category', 'text', $this->string(1500));

    }

    /**
     * @inheritdoc
     */
    public function down()
    {
    }
}
