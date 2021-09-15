<?php

namespace app\models;

use yii\data\ActiveDataProvider;

class FilterSearch extends Filter
{
    public function search($params)
    {
        //поиск таблицы Filter в БД
        $query = Filter::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this -> load($params);

        if (!$this -> validate()) {
            return $dataProvider;
        };

        $query->andFilterWhere([
            'id' => $this -> id,
        ]);

        $query -> andFilterWhere(['like', 'title', $this -> title])
            -> andFilterWhere(['like', 'type', $this -> type])
            -> andFilterWhere(['like', 'value', $this -> value]);

        return $dataProvider;
    }
}