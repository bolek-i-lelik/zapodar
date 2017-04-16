<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property integer $id
 * @property string $name
 * @property integer $parent
 * @property integer $pokaz
 * @property integer $picture
 * @property string $meta_title
 * @property string $meta_keywords
 * @property string $meta_description
 * @property string $text
 * @property integer $deko_id
 * @property integer $deko_parent
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['name'], 'required'],
            [['pokaz', 'deko_id', 'deko_parent'], 'integer'],
            [['name', 'picture', 'meta_title', 'meta_keywords', 'meta_description'], 'string', 'max' => 255],
            [['text'], 'string', 'max' => 10000],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'parent' => 'ID родительской категории',
            'pokaz' => 'Публикация',
            'picture' => 'Изображение',
            'meta_title' => 'title',
            'meta_keywords' => 'keywords',
            'meta_description' => 'description',
            'text' => 'text',
            'deko_id' => 'deko_id',
            'deko_parent' => 'deko_parent',
        ];
    }
}
