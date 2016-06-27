<?php
namespace hisite\modules\news\models;

use hipanel\base\ModelTrait;
use hiqdev\hiart\ActiveRecord;

class ArticleData extends ActiveRecord
{
    use ModelTrait;

    public static function primaryKey()
    {
        return ['article_id', 'lang'];
    }

    public function getIsNewRecord()
    {
        return empty($this->getPrimaryKey()['article_id']);
    }

    public function rules()
    {
        return [
            [[
                'text',
                'lang',
                'html_title',
                'html_keywords',
                'title',
                'short_text',
                'text',
            ], 'safe', 'on' => ['create', 'update']],
            [['article_id', 'lang_id'], 'integer', 'on' => ['create', 'update']],
        ];
    }
}
