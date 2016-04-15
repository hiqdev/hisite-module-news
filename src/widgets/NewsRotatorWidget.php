<?php

namespace hisite\modules\news\widgets;

use hiqdev\hiart\ActiveDataProvider;
use hisite\modules\news\models\Article;
use Yii;
use yii\base\Widget;

class NewsRotatorWidget extends Widget
{

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Article::find()->joinWith('data')->news(),
            'pagination' => [
                'pageSize' => 9,
            ],
        ]);

        return $this->render((new \ReflectionClass($this))->getShortName(), [
            'dataProvider' => $dataProvider
        ]);
    }
}