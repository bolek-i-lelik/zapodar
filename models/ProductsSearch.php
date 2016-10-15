<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Products;

/**
 * ProductsSearch represents the model behind the search form about `app\models\Products`.
 */
class ProductsSearch extends Products
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'alias', 'price', 'currencyid', 'categoryid', 'picture', 'pickup', 'delivery', 'name', 'description', 'sales_notes', 'group_id', 'params', 'prosmotr', 'available', 'vendor', 'country', 'edinica', 'nalichie', 'garantie', 'sale', 'keywords'], 'safe'],
            [['buy', 'productsid', 'vendorcode', 'count', 'podrazdelid', 'group_raznovid_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Products::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'buy' => $this->buy,
            'productsid' => $this->productsid,
            'vendorcode' => $this->vendorcode,
            'count' => $this->count,
            'podrazdelid' => $this->podrazdelid,
            'group_raznovid_id' => $this->group_raznovid_id,
        ]);

        $query->andFilterWhere(['like', 'id', $this->id])
            ->andFilterWhere(['like', 'alias', $this->alias])
            ->andFilterWhere(['like', 'price', $this->price])
            ->andFilterWhere(['like', 'currencyid', $this->currencyid])
            ->andFilterWhere(['like', 'categoryid', $this->categoryid])
            ->andFilterWhere(['like', 'picture', $this->picture])
            ->andFilterWhere(['like', 'pickup', $this->pickup])
            ->andFilterWhere(['like', 'delivery', $this->delivery])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'sales_notes', $this->sales_notes])
            ->andFilterWhere(['like', 'group_id', $this->group_id])
            ->andFilterWhere(['like', 'params', $this->params])
            ->andFilterWhere(['like', 'prosmotr', $this->prosmotr])
            ->andFilterWhere(['like', 'available', $this->available])
            ->andFilterWhere(['like', 'vendor', $this->vendor])
            ->andFilterWhere(['like', 'country', $this->country])
            ->andFilterWhere(['like', 'edinica', $this->edinica])
            ->andFilterWhere(['like', 'nalichie', $this->nalichie])
            ->andFilterWhere(['like', 'garantie', $this->garantie])
            ->andFilterWhere(['like', 'sale', $this->sale])
            ->andFilterWhere(['like', 'keywords', $this->keywords]);

        return $dataProvider;
    }
}
