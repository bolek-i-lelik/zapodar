<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\User;

/**
 * UserSearch represents the model behind the search form about `app\models\User`.
 */
class UserSearch extends User
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'category_id', 'sex', 'reg_email', 'podpiska'], 'integer'],
            [['familie', 'name', 'father', 'foto', 'born', 'e_mail', 'tel', 'adress', 'info', 'password', 'auth_key', 'created_at', 'username', 'access_token', 'secret_key', 'date_valid_secret_key'], 'safe'],
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
        $query = User::find();

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
            'category_id' => $this->category_id,
            'sex' => $this->sex,
            'reg_email' => $this->reg_email,
            'podpiska' => $this->podpiska,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'familie', $this->familie])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'father', $this->father])
            ->andFilterWhere(['like', 'foto', $this->foto])
            ->andFilterWhere(['like', 'born', $this->born])
            ->andFilterWhere(['like', 'e_mail', $this->e_mail])
            ->andFilterWhere(['like', 'tel', $this->tel])
            ->andFilterWhere(['like', 'adress', $this->adress])
            ->andFilterWhere(['like', 'info', $this->info])
            ->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like', 'auth_key', $this->auth_key])
            ->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'access_token', $this->access_token])
            ->andFilterWhere(['like', 'secret_key', $this->secret_key])
            ->andFilterWhere(['like', 'date_valid_secret_key', $this->date_valid_secret_key]);

        return $dataProvider;
    }
}
