<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Operations;

/**
 * OperationsSearch represents the model behind the search form about `app\models\Operations`.
 */
class OperationsSearch extends Operations
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['serial_number', 'using_date'], 'safe'],
            [['debit_kredit'], 'number'],
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
        $query = Operations::find();

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
            'id' => $this->id,
            'using_date' => $this->using_date,
            'debit_kredit' => $this->debit_kredit,
        ]);

        $query->andFilterWhere(['like', 'serial_number', $this->serial_number]);

        return $dataProvider;
    }
}
