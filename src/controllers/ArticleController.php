<?php

namespace hisite\modules\news\controllers;

use hipanel\base\Controller;
use hipanel\actions\IndexAction;
use hisite\modules\news\models\Article;
use Yii;
use yii\base\Event;

class ArticleController extends Controller
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
            'model' => Article::find()->joinWith('texts')->andWhere(['id' => $id])->one(),
        ]);
    }
}
