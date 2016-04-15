<?php
namespace hisite\modules\news\models;

use hipanel\base\ModelTrait;
use hiqdev\hiart\ActiveRecord;

class ArticleData extends ActiveRecord
{
    use ModelTrait;

    public function rules()
    {
        return [
            [[
                'text',
                'name',
                'html_title',
                'html_keywords',
                'title',
                'short_text',
                'text',
            ], 'string'],
            [['article_id', 'lang_id', ], 'integer']
        ];
    }
}