<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Program;

/**
 * ProgramSearch represents the model behind the search form of `app\models\Program`.
 */
class ProgramSearch extends Program
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_discipline', 'id_specialization', 'id_commission', 'id_user', 'version', 'count_hours'], 'integer'],
            [['introduction_date', 'learning_cycle', 'application', 'place_discipline', 'attestation', 'support', 'evaluation_criterion', 'evaluation_method'], 'safe'],
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
        $query = Program::find();

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
            'id_discipline' => $this->id_discipline,
            'id_specialization' => $this->id_specialization,
            'id_commission' => $this->id_commission,
            'id_user' => $this->id_user,
            'version' => $this->version,
            'count_hours' => $this->count_hours,
            'introduction_date' => $this->introduction_date,
        ]);

        $query->andFilterWhere(['like', 'learning_cycle', $this->learning_cycle])
            ->andFilterWhere(['like', 'application', $this->application])
            ->andFilterWhere(['like', 'place_discipline', $this->place_discipline])
            ->andFilterWhere(['like', 'attestation', $this->attestation])
            ->andFilterWhere(['like', 'support', $this->support])
            ->andFilterWhere(['like', 'evaluation_criterion', $this->evaluation_criterion])
            ->andFilterWhere(['like', 'evaluation_method', $this->evaluation_method]);

        return $dataProvider;
    }
}
