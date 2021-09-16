<?php

namespace app\controllers;

use Yii;
use app\models\Filter;
use app\models\FilterSearch;
use app\models\UserFilterSearch;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class FilterController extends Controller
{
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
        $types = Filter::$filter_type_name;

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
        $types = Filter::$filter_type_name;

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
        $model = $this -> findModel($id);

        $searchModel = new UserFilterSearch();
        $dataProvider = $searchModel -> search('user', $model -> type, $model -> value);

        return $this -> render('view', [
            'model' => $model,
            'dataProvider' => $dataProvider,
        ]);
    }
}
