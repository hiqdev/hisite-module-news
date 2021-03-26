<?php

namespace hisite\modules\news\widgets;

use hiqdev\hiart\ActiveDataProvider;
use hisite\modules\news\models\Article;
use yii\base\Widget;

class NewsRotatorWidget extends Widget
{
    public int $pageSize = 9;

    public function run(): string
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Article::find()->joinWith('texts')->news(),
            'pagination' => [
                'pageSize' => $this->pageSize,
            ],
        ]);

        return $this->render((new \ReflectionClass($this))->getShortName(), [
            'dataProvider' => $dataProvider,
        ]);
    }
}