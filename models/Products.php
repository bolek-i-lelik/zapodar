<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property string $id
 * @property string $alias
 * @property string $price
 * @property string $currencyid
 * @property string $categoryid
 * @property string $picture
 * @property integer $pickup
 * @property integer $delivery
 * @property string $name
 * @property string $description
 * @property string $sales_notes
 * @property string $group_id
 * @property string $params
 * @property integer $prosmotr
 * @property integer $buy
 * @property string $available
 * @property integer $productsid
 * @property string $vendorcode
 * @property string $vendor
 * @property string $country
 * @property string $edinica
 * @property string $nalichie
 * @property string $count
 * @property string $podrazdelid
 * @property string $garantie
 * @property string $sale
 * @property string $group_raznovid_id
 * @property string $keywords
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            //[['pickup', 'delivery', 'prosmotr', 'buy', 'productsid', 'vendorcode'], 'string'],
            //[['description', 'edinica', 'nalichie', 'garantie', 'sale', 'keywords'], 'string'],
            [['available', 'productsid'], 'required'],
            //[['id', 'alias', 'price', 'currencyid', 'categoryid','name', 'sales_notes', 'group_id', 'available', 'vendor', 'country'], 'string', 'max' => 255],
            //[['picture'], 'string', 'max' => 1000],
            //[['params'], 'string', 'max' => 1500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'alias' => 'Alias',
            'price' => 'Цена',
            'currencyid' => 'Currencyid',
            'categoryid' => 'Categoryid',
            'picture' => 'Фотографии',
            'pickup' => 'Pickup',
            'delivery' => 'Delivery',
            'name' => 'Заголовок',
            'description' => 'Описание',
            'sales_notes' => 'Sales Notes',
            'group_id' => 'Group ID',
            'params' => 'Параметры',
            'prosmotr' => 'Кол-во просмотров',
            'buy' => 'Количество покупок',
            'available' => 'Активно',
            'productsid' => 'Productsid',
            'vendorcode' => 'Vendorcode',
            'vendor' => 'Производитель/Продавец',
            'country' => 'Страна производитель',
            'edinica' => 'Единица измерения',
            'nalichie' => 'Наличие',
            'count' => 'Количество на складе',
            'podrazdelid' => 'Идентификатор подраздела',
            'garantie' => 'Гарантия',
            'sale' => 'Скидка',
            'group_raznovid_id' => 'Идентификатор группы разновидностей',
            'keywords' => 'Ключевые слова и фразы',
        ];
    }
}
