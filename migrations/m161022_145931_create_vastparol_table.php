<?php

use yii\db\Migration;

/**
 * Handles the creation for table `vastparol`.
 */
class m161022_145931_create_vastparol_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('vastparol', [
            'id' => $this->primaryKey(),
            'secret_key' => $this->string(),
            'date_valid_secret_key' => $this->string(),
            'username' => $this->string(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('vastparol');
    }
}
