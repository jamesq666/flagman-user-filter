<?php

namespace app\controllers;

use app\models\UserFilterSearch;
use Yii;
use app\models\Filter;
use app\models\FilterSearch;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class FilterController extends Controller
{
    const FILTER_TYPE_USERNAME = 0;
    const FILTER_TYPE_PHONE = 1;
    const FILTER_TYPE_TOKEN = 2;
    const FILTER_TYPE_EMAIL = 3;
    const FILTER_TYPE_BIRTHDAY = 4;

    public static function getFilterTypeName () {
        $filter_type_name = [
            self::FILTER_TYPE_USERNAME => 'Имя пользователя',
            self::FILTER_TYPE_PHONE => 'Телефон',
            self::FILTER_TYPE_TOKEN => 'Токен',
            self::FILTER_TYPE_EMAIL => 'E-mail',
            self::FILTER_TYPE_BIRTHDAY => 'Дата рождения',
        ];

        return $filter_type_name;
    }

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    protected function findModel($id)
    {
        if (($model = Filter::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionIndex()
    {
        $searchModel = new FilterSearch();
        $dataProvider = $searchModel -> search(Yii::$app -> request -> queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreate()
    {
        $model = new Filter();
        $types = $this -> getFilterTypeName();

        if ($model -> load(Yii::$app -> request -> post()) && $model -> save() ) {
            return $this -> redirect(['view', 'id' => $model -> id]);
        } else {
            return $this -> render('create', [
                'model' => $model,
                'types' => $types,
            ]);
        }
    }

    public function actionUpdate($id)
    {
        $model = $this -> findModel($id);
        $types = $this -> getFilterTypeName();

        if ($model -> load(Yii::$app -> request -> post()) && $model -> save() ) {
            return $this -> redirect(['view', 'id' => $model -> id]);
        } else {
            return $this -> render('update', [
                'model' => $model,
                'types' => $types,
            ]);
        }
    }

    public function actionDelete($id)
    {
        $model = $this -> findModel($id) -> delete();

        return $this -> redirect(['index']);
    }

    public function actionView($id)
    {
        $type = $this -> findModel($id) -> type;
        $value = $this -> findModel($id) -> value;

        $searchModel = new UserFilterSearch();
        $dataProvider = $searchModel -> search('user', $type, $value);

        return $this -> render('view', [
            'model' => $this -> findModel($id),
            'dataProvider' => $dataProvider,
            'type' => $type,
        ]);
    }
}
