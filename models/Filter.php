<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * @property integer $id
 * @property string $title
 * @property string $type
 * @property string $value
 */

class Filter extends ActiveRecord
{
    //Функция переопределяет имя таблицы, чтобы всегда использовалась таблица Filter
    public static function tableName() {
        return 'filter';
    }

    //Возвращает правила проверки атрибутов.
    //Правила проверки используются функцией validate ()
    //для проверки допустимости значений атрибутов.
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['title', 'type', 'value'], 'safe'],
        ];
    }

    //Определяет, как будут выглядеть лейблы полей
    public function attributeLabels()
    {
        return [
            'id' => 'Идентификатор',
            'title' => 'Название',
            'type' => 'Тип',
            'value' => 'Значение',
        ];
    }
}