<?php

use yii\db\Migration;

/**
 * Handles the creation for table `slider`.
 */
class m161017_110014_create_slider_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('slider', [
            'id' => $this->primaryKey(),
            'description' => $this->string(),
            'image' => $this->string(),
            'link' => $this->string(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('slider');
    }
}
