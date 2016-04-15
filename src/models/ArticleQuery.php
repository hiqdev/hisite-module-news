<?php

namespace hisite\modules\news\models;

use hiqdev\hiart\ActiveQuery;

class ArticleQuery extends ActiveQuery
{

    public function news()
    {
        $this->andWhere(['type' => ['promo', 'news']]);

        return $this;
    }

    public function joinWith($with)
    {
        if ($with === 'data') {
            $this->andWhere(['with_data' => 1]);
        }

        return parent::joinWith($with);
    }

    /**
     * @inheritdoc
     * @return Article[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Article|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}