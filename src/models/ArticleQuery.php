<?php

namespace hisite\modules\news\models;

use hiqdev\hiart\ActiveQuery;

class ArticleQuery extends ActiveQuery
{
    public function news(): self
    {
        $this->andWhere(['type' => ['news']]);

        return $this;
    }

    public function promo(): self
    {
        $this->andWhere(['type' => ['promo']]);

        return $this;
    }

    public function joinWith($with): self
    {
        if ($with === 'texts') {
            $this->andWhere(['with_texts' => 1]);
        }

        return parent::joinWith($with);
    }

    public function showUnpublished(): self
    {
        $this->andWhere(['show_unpublished' => true]);

        return $this;
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
