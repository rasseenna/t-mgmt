<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Trainer;

/**
 * TrainerSearch represents the model behind the search form of `backend\models\Trainer`.
 */
class TrainerSearch extends Trainer
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['t_id', 'age', 's_id'], 'integer'],
            [['t_name', 'email', 'job_title', 'mobile_number', 'imageUrl', 'address', 't_status'], 'safe'],
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
        $query = Trainer::find();

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
            't_id' => $this->t_id,
            'age' => $this->age,
            's_id' => $this->s_id,
        ]);

        $query->andFilterWhere(['like', 't_name', $this->t_name])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'job_title', $this->job_title])
            ->andFilterWhere(['like', 'mobile_number', $this->mobile_number])
            ->andFilterWhere(['like', 'imageUrl', $this->imageUrl])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 't_status', $this->t_status]);

        return $dataProvider;
    }
}
