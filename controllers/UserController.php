<?php

namespace app\controllers;

use Yii;
use app\models\User;
use app\models\UserSearch;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class UserController extends Controller
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

    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreate()
    {
        $model = new User();

        if ($model -> load(Yii::$app -> request -> post()) && $model -> save() ) {
            return $this -> redirect(['view', 'id' => $model -> id]);
        } else {
            return $this -> render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionUpdate($id)
    {
        $model = $this -> findModel($id);

        if ($model -> load(Yii::$app -> request -> post()) && $model -> save() ) {
            return $this -> redirect(['view', 'id' => $model -> id]);
        } else {
            return $this -> render('update', [
                'model' => $model,
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
        return $this -> render('view', [
            'model' => $this -> findModel($id),
        ]);
    }

    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
