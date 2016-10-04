<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property integer $id
 * @property string $title
 * @property string $name
 * @property string $description
 * @property string $keywords
 * @property string $text
 * @property string $prev_text
 * @property string $created_at
 * @property integer $prosmotr
 * @property string $prev_foto
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'name', 'description', 'keywords', 'prev_text'], 'required'],
            [['text'], 'string'],
            [['created_at'], 'safe'],
            [['prosmotr'], 'integer'],
            [['title', 'name', 'description', 'keywords', 'prev_text', 'prev_foto'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'name' => 'Заголовок',
            'description' => 'Description',
            'keywords' => 'Keywords',
            'text' => 'Текст новости',
            'prev_text' => 'Анонс новости',
            'created_at' => 'Добавлена',
            'prosmotr' => 'Кол-во просмотров',
            'prev_foto' => 'Фото к превью',
        ];
    }
}
