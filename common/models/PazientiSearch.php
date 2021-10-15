<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Pazienti;

/**
 * PazientiSearch represents the model behind the search form of `common\models\Pazienti`.
 */
class PazientiSearch extends Pazienti
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idpazienti', 'idanestesista', 'età'], 'integer'],
            [['nome', 'cognome', 'uo', 'ospedale'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Pazienti::find();

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
            'idpazienti' => $this->idpazienti,
            'idanestesista' => $this->idanestesista,
            'età' => $this->età,
        ]);

        $query->andFilterWhere(['like', 'nome', $this->nome])
            ->andFilterWhere(['like', 'cognome', $this->cognome])
            ->andFilterWhere(['like', 'uo', $this->uo])
            ->andFilterWhere(['like', 'ospedale', $this->ospedale]);

        return $dataProvider;
    }
}
