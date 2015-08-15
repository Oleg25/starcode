<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Card;

/**
 * CardSearch represents the model behind the search form about `app\models\Card`.
 */
class CardSearch extends Card
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['serial', 'expires_date', 'release_date', 'using_date'], 'safe'],
            [['number'], 'integer'],
            [['cash'], 'number'],
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
        $query = Card::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'number' => $this->number,
            'expires_date' => $this->expires_date,
            'release_date' => $this->release_date,
            'using_date' => $this->using_date,
            'cash' => $this->cash,
        ]);

        $query->andFilterWhere(['like', 'serial', $this->serial]);

        return $dataProvider;
    }
}
