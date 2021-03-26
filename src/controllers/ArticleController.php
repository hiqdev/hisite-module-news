<?php

namespace hisite\modules\news\controllers;

use hipanel\base\Controller;
use hisite\modules\news\models\Article;
use hisite\modules\news\models\ArticleSearch;
use yii\filters\AccessControl;
use Yii;

class ArticleController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['index'],
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $searchModel = new ArticleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination = [
            'pageSize' => 100,
        ];
        $dataProvider->query->joinWith('texts')->news();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => Article::find()->joinWith('texts')->andWhere(['id' => $id])->one(),
        ]);
    }
}
