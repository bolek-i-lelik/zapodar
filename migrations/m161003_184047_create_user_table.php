<?php

use yii\db\Migration;

/**
 * Handles the creation for table `user`.
 */
class m161003_184047_create_user_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer(1)->defaultValue(0),
            'familie' => $this->string(100)->defaultValue(0),
            'name' => $this->string(100)->defaultValue(0),
            'father' => $this->string(100)->defaultValue(0),
            'foto' => $this->string(100)->defaultValue('empty_foto.png'),
            'born' => $this->string(100)->defaultValue(0),
            'sex' => $this->integer(1)->defaultValue(0),
            'e_mail' => $this->string(100)->defaultValue(0),
            'tel' => $this->string(11)->defaultValue(0),
            'adress' => $this->string()->defaultValue(0),
            'info' => $this->string()->defaultValue(0),
            'password' => $this->string(32)->notNull(),
            'reg_email' => $this->integer(1)->defaultValue(0),
            'podpiska' => $this->integer(1)->defaultValue(0),
            'auth_key' => $this->string()->defaultValue(0),
            'created_at' => $this->timestamp()->notNull(),
            'username' => $this->string()->notNull(),
            'access_token' => $this->string(32)->defaultValue(0),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('user');
    }
}
