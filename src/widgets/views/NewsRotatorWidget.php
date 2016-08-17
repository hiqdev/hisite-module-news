<?php
use yii\helpers\Html;
use yii\helpers\StringHelper;
use yii\widgets\ListView;
/* @var $dataProvider hiqdev\hiart\ActiveDataProvider */
?>
<!-- TESTIMONIALS -->
<div class="testimonials">
    <div class="row">
        <div class="col-sm-12">
            <h3><?= Yii::t('hisite/news', 'Our news') ?></h3>
            <hr class="hr-awesome">

            <?= ListView::widget([
                'dataProvider' => $dataProvider,
                'itemOptions' => ['class' => 'item'],
                'itemView' => function ($model) {
                    $out = sprintf(
                        "<div class=\"testimonial-content\">
                            <h3>%s</h3>
                            <span>%s</span>
                            <p>%s</p>
                        </div>",
                        Html::a(Html::encode($model->translation->title), ['/news/article/view', 'id' => $model->id]),
                        Yii::$app->formatter->asDate($model->post_date),
                        StringHelper::countWords($model->translation->short_text) !== 0 ?
                            strip_tags($model->translation->short_text) :
                            '',
                        Html::a(Yii::t('hisite/news', 'Read more'), ['/news/article/view', 'id' => $model->id])
                    );

                    return $out;
                },
                'layout' => "{items}",
                'options' => [
                    'id' => 'testimonials-carousel',
                    'class' => 'owl-carousel'
                ]
            ]) ?>

            <p class="text-center md-mt-50">
                <?= Html::a(Yii::t('hisite', 'READ ALL NEWS'), ['/news/article/index'], ['class' => 'mtr-btn button-purple ripple btn-lg order-vps has-ripple']) ?>
            </p>
        </div>
    </div>
</div>
<!-- END OF TESTIMONIALS -->
