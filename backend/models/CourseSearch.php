<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Course;

/**
 * CourseSearch represents the model behind the search form of `backend\models\Course`.
 */
class CourseSearch extends Course
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['c_id'], 'integer'],
            [['c_name', 'description', 'c_code', 'c_status'], 'safe'],
            [['price', 'hours'], 'number'],
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
        $query = Course::find();

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
            'c_id' => $this->c_id,
            'price' => $this->price,
            'hours' => $this->hours,
        ]);

        $query->andFilterWhere(['like', 'c_name', $this->c_name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'c_code', $this->c_code])
            ->andFilterWhere(['like', 'c_status', $this->c_status]);

        return $dataProvider;
    }
}
