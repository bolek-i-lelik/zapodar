<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Hlep;

/**
 * HlepSearch represents the model behind the search form about `app\models\Hlep`.
 */
class HlepSearch extends Hlep
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'pokaz'], 'integer'],
            [['vopros', 'otvet'], 'safe'],
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
        $query = Hlep::find();

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
            'id' => $this->id,
            'pokaz' => $this->pokaz,
        ]);

        $query->andFilterWhere(['like', 'vopros', $this->vopros])
            ->andFilterWhere(['like', 'otvet', $this->otvet]);

        return $dataProvider;
    }
}
