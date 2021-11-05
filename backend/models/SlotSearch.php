<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Slot;

/**
 * SlotSearch represents the model behind the search form of `backend\models\Slot`.
 */
class SlotSearch extends Slot
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['s_id'], 'integer'],
            [['s_name', 'from_time', 'to_time', 's_status'], 'safe'],
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
        $query = Slot::find();

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
            's_id' => $this->s_id,
        ]);

        $query->andFilterWhere(['like', 's_name', $this->s_name])
            ->andFilterWhere(['like', 'from_time', $this->from_time])
            ->andFilterWhere(['like', 'to_time', $this->to_time])
            ->andFilterWhere(['like', 's_status', $this->s_status]);

        return $dataProvider;
    }
}
