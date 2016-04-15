<?php

namespace hisite\modules\news\controllers;

use app\controllers\Controller;
use hipanel\actions\IndexAction;
use hisite\modules\news\models\Article;
use Yii;
use yii\base\Event;
use yii\base\ViewContextInterface;

class ArticleController extends Controller implements ViewContextInterface
{
    public function actions()
    {
        return [
            'index' => [
                'class' => IndexAction::class,
                'on beforePerform' => function (Event $event) {
                    /** @var \hipanel\actions\SearchAction $action */
                    $action = $event->sender;
                    $dataProvider = $action->getDataProvider();
                    $dataProvider->pagination = [
                        'pageSize' => 5,
                    ];
                    $dataProvider->query->joinWith('data')->news();
                }

            ]
        ];
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => Article::find()->joinWith('data')->andWhere(['id' => $id])->one(),
        ]);
    }
}