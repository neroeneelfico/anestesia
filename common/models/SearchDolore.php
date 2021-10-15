<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Dolore;

/**
 * SearchDolore represents the model behind the search form of `common\models\Dolore`.
 */
class SearchDolore extends Dolore
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['iddolore', 'idprocedure', 'idanestesista', 'scaladolore'], 'integer'],
            [['orariodolore'], 'safe'],
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
        $query = Dolore::find();

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
            'iddolore' => $this->iddolore,
            'idprocedure' => $this->idprocedure,
            'idanestesista' => $this->idanestesista,
            'scaladolore' => $this->scaladolore,
        ]);

        $query->andFilterWhere(['like', 'orariodolore', $this->orariodolore]);

        return $dataProvider;
    }
}
