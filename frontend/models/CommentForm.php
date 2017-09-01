<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class CommentForm extends Model {

    public $name;
    public $email;
    public $comment;

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            // name, email, subject and body are required
            [['name', 'email', 'comment'], 'required'],
            // email has to be a valid email address
            [['email'], 'email'],
            // name min variable 2 symbolse
            [['name'], 'string', 'max' => 15],
            // pattern проверяет, что "user" начинается с буквы и содержит только буквенные символы,
            // числовые символы и знак подчеркивания
            [['name'], 'match', 'pattern' => '/^[a-z]\w*$/i'],
            [['comment'], 'string', 'max' => 300],
        ];
    }

    public function save() {

        $sql = "INSERT "
                . "INTO comment (id, name, email, text) "
                . "VALUES (NULL, '{$this->name}', '{$this->email}', '{$this->comment}');";

        return Yii::$app->db->createCommand($sql)->execute();
    }

    public function getList() {

        $sql = "SELECT name, text, data "
                . "FROM comment;";

        return Yii::$app->db->createCommand($sql)->queryAll();
    }
}
