<?php

namespace app\models;

use app\models\User;
use yii\data\ActiveDataProvider;

class UserSearch extends User

{
    public function search($params)
    {
        //поиск таблицы Users в БД
        $query = User::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this -> load($params);

        if (!$this -> validate()) {
            return $dataProvider;
        };

        $query->andFilterWhere([
            'id' => $this->id,
            'reg_date' => $this->reg_date,
            'last_visit' => $this->last_visit,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'phone_number', $this->phone_number])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'token', $this->token])
            ->andFilterWhere(['>=', 'birthday', $this->birthday]);

        return $dataProvider;
    }
}