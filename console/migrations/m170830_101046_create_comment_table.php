<?php

use yii\db\Migration;

/**
 * Handles the creation of table `comment`.
 */
class m170830_101046_create_comment_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('comment', [
            'id' => $this->primaryKey(),
            'name' => $this->string(50),
            'email' => $this->string(50)->unique(),
            'text' => $this->text(),
            'data' => $this->dateTime(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('comment');
    }
}