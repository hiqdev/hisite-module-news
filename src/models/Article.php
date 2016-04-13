<?php

namespace hisite\modules\news\models;


class Article extends \hipanel\base\Model
{
    use \hipanel\base\ModelTrait;

    public function rules()
    {
        return [
            [[
                'id',
                'article_name',
                'author_id',
                'post_date',
                'type',
                'type_id',
                'type_name',
                'is_published',
                'with_data',
                'data'
            ], 'safe'],
        ];
    }

    public function afterFind()
    {
        $this->data = $this->resolveLanguage($this->data);
        parent::afterFind();
    }

    private function resolveLanguage(array $data)
    {
        $result = [];
        foreach ($data as $langId => $source) {
            $result[$source['name']] = $source;
        }

        return $result;
    }
}