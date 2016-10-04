<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "articles".
 *
 * @property integer $id
 * @property string $name
 * @property string $title
 * @property string $description
 * @property string $keywords
 * @property string $alias
 * @property string $created_at
 */
class Articles extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'articles';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'title', 'description', 'keywords', 'alias'], 'required'],
            [['created_at'], 'safe'],
            [['name', 'title', 'description', 'keywords', 'alias'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Заголовок',
            'title' => 'Title',
            'description' => 'Description',
            'keywords' => 'Keywords',
            'alias' => 'Alias',
            'created_at' => 'Добавлена',
        ];
    }
}
