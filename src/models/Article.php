<?php

namespace hisite\modules\news\models;


class Article extends \hipanel\base\Model
{
    use \hipanel\base\ModelTrait;

    public function getHtmlPurifierConfig()
    {
        return [
            'HTML.AllowedElements' => [
                'strong' => true,
                'em' => true,
                'ul' => true,
                'ol' => true,
                'li' => true,
                'img' => true,
                'a' => true,
                'p' => true,
                'span' => true,
            ],
            'HTML.AllowedAttributes' => [
                '*.style' => true,
                '*.title' => true,
                'a.href' => true,
                'img.src' => true,
            ],
            'HTML.Trusted' => true,
            'HTML.TidyAdd' => [],
            'HTML.TidyLevel' => 'heavy',
        ];
    }

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
            ], 'safe'],
        ];
    }

    public function getData()
    {
        return $this->hasMany(ArticleData::class, ['article_id' => 'id'])->indexBy('name');
    }

    public function getTranslation($language = null)
    {
        if ($language === null) {
            $language = \Yii::$app->language;
        }

        return $this->data[$language];
    }

    /**
     * @param array $options
     * @return ArticleQuery
     */
    public static function find($options = [])
    {
        $config = [
            'class'   => ArticleQuery::className(),
            'options' => $options,
        ];
        return \Yii::createObject($config, [get_called_class()]);
    }
}
