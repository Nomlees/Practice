<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;


/**
 * GroupSearch represents the model behind the search form of `app\models\Group`.
 */
class GroupSearch extends Group {


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID', 'Change'], 'integer'],
            [['Title', 'Curator'], 'safe'],
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
        $query = Group::find();

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
            'ID' => $this->ID,
            //'Change' => $this->Change,
        ]);
//
//        $query->andFilterWhere(['like', 'Title', $this->Title])
//            ->andFilterWhere(['like', 'Curator', $this->Curator])
//            ->andFilterWhere(['like', 'Students', $this->students]);

        return $dataProvider;
    }
}
