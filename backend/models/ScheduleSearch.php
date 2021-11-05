<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Schedule;

/**
 * ScheduleSearch represents the model behind the search form of `backend\models\Schedule`.
 */
class ScheduleSearch extends Schedule
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sh_id', 'c_id', 't_id', 's_id'], 'integer'],
            [['location', 'date', 'sh_status'], 'safe'],
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
        $query = Schedule::find();

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
            'sh_id' => $this->sh_id,
            'c_id' => $this->c_id,
            't_id' => $this->t_id,
            's_id' => $this->s_id,
            'date' => $this->date,
        ]);

        $query->andFilterWhere(['like', 'location', $this->location])
            ->andFilterWhere(['like', 'sh_status', $this->sh_status]);

        return $dataProvider;
    }
}
