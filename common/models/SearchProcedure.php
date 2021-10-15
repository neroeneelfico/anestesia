<?php

namespace common\models;

use common\models\Procedure;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * SearchProcedure represents the model behind the search form of `common\models\Procedure`.
 */
class SearchProcedure extends Procedure
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idprocedure', 'idpazienti', 'idanestesista'], 'integer'],
            [['tipoanestesia', 'analgesiaperiop', 'analgesiapostop'], 'safe'],
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
        $query = Procedure::find();

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
            'idprocedure' => $this->idprocedure,
            'idpazienti' => $this->idpazienti,
            'idanestesista' => $this->idanestesista,
        ]);

        $query->andFilterWhere(['like', 'tipoanestesia', $this->tipoanestesia])
            ->andFilterWhere(['like', 'analgesiaperiop', $this->analgesiaperiop])
            ->andFilterWhere(['like', 'analgesiapostop', $this->analgesiapostop]);

        return $dataProvider;
    }
    public function searchProcedura($params,$id)
    {
        $query = Procedure::find();

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
            'idprocedure' => $this->idprocedure,
            'idpazienti' => $id,
            'idanestesista' => $this->idanestesista,
        ]);

        $query->andFilterWhere(['like', 'tipoanestesia', $this->tipoanestesia])
            ->andFilterWhere(['like', 'analgesiaperiop', $this->analgesiaperiop])
            ->andFilterWhere(['like', 'analgesiapostop', $this->analgesiapostop]);

        return $dataProvider;
    }
}
