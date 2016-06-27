<?php

namespace hisite\modules\news\models;

use hipanel\base\SearchModelTrait;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * PostSearch represents the model behind the search form about `common\models\Post`.
 */
class ArticleSearch extends Article
{
    use SearchModelTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[
                'id',
                'name',
                'author_id',
                'post_date',
                'type',
                'type_id',
                'type_name',
                'is_published',
            ], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }
}
