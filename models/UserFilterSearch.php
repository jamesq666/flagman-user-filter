<?php

namespace app\models;

use yii\data\ActiveDataProvider;

class UserFilterSearch extends User
{
    public function search($params, $type, $value)
    {
        //поиск таблицы Filter в БД
        $query = User::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this -> load($params);

        if (!$this -> validate()) {
            return $dataProvider;
        };

        switch ($type) {
          case '0': $field = 'username';
            break;
          case '1': $field = 'phone_number';
              break;
          case '2': $field = 'token';
              break;
          case '3': $field = 'email';
              break;
          case '4': $field = 'birthday';
              break;
        }

        $query -> andFilterWhere(['like', $field, $value]);

        return $dataProvider;
    }
}