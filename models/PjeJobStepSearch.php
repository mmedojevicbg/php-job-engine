<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PjeJobStep;

/**
 * PjeJobStepSearch represents the model behind the search form about `app\models\PjeJobStep`.
 */
class PjeJobStepSearch extends PjeJobStep
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'job_id', 'step_id', 'order_num', 'stop_on_failure'], 'integer'],
            [['title'], 'safe'],
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
        $query = PjeJobStep::find();

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
            'job_id' => $this->job_id,
            'step_id' => $this->step_id,
            'order_num' => $this->order_num,
            'stop_on_failure' => $this->stop_on_failure,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title]);

        return $dataProvider;
    }
}
