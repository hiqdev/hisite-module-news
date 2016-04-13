<?php

namespace hisite\modules\news\controllers;

use hisite\modules\news\models\Article;
use hisite\modules\news\models\ArticleSearch;
use Yii;
use yii\base\ViewContextInterface;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class ArticleController extends Controller implements ViewContextInterface
{
    public function actionIndex()
    {
        $searchModel = new ArticleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    protected function findModel($id)
    {
        if (($model = Article::findOne(['id' => $id, 'with_data' => 1])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}