<?php

namespace hisite\modules\news\models;

use hipanel\helpers\ArrayHelper;

class Article extends \hipanel\base\Model
{
    use \hipanel\base\ModelTrait {
        attributes as defaultAttributes;
    }

    /**
     * @var ArticleData[]
     * @see getAddedTexts
     */
    private $_texts = [];

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

    public function attributes()
    {
        $attributes = $this->defaultAttributes();
        unset($attributes[array_search('texts', $attributes, true)]);
        return $attributes;
    }

    public function setOldAttribute($name, $value)
    {
        if ($name !== 'texts') {
            parent::setOldAttribute($name, $value);
        }
    }

    public function rules()
    {
        return [
            [['id', 'author_id'], 'integer'],
            [['name', 'post_date', 'type_label', 'type', 'author', 'realm'], 'safe'],
            [['is_published'], 'boolean'],
            [['id'], 'required', 'on' => ['update', 'delete']],
            [['name'], 'required', 'on' => ['create', 'update']],
            [['name', 'texts'], 'safe', 'on' => ['create', 'update']],
        ];
    }

    /**
     * @return array|\hiqdev\hiart\ActiveQuery
     */
    public function getTexts()
    {
        return in_array($this->scenario, ['create', 'update'], true)
            ? ArrayHelper::toArray($this->_texts)
            : $this->hasMany(ArticleData::class, ['article_id' => 'id']);
    }

    public function getAddedTexts()
    {
        return $this->_texts;
    }

    public function setAddedTexts(array $texts)
    {
        foreach ($texts as $text) {
            $this->addText($text);
        }
    }

    public function addText(ArticleData $text)
    {
        $this->_texts[$text->lang] = $text;
    }

    public function getTranslation($language = null)
    {
        $language = ($language === null) ? \Yii::$app->language : $language;
        if (is_array($this->texts)) {
            foreach ($this->texts as $k => $translation) {
                if ($translation->lang === $language)
                    return $translation;

            }
        }

        return null;
    }

    /**
     * @param array $options
     * @return ArticleQuery
     */
    public static function find($options = [])
    {
        $config = [
            'class' => ArticleQuery::class,
            'options' => $options,
        ];
        return \Yii::createObject($config, [get_called_class()]);
    }
}
