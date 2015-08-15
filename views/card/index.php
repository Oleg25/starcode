<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CardSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cards';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Card', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <p>
        <?= Html::a('Generate Card', ['generator'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(['id'=>'cards']); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'serial',
            'number',
            'expires_date',
            'release_date',
            'status',
            //'using_date',
            // 'cash',

            ['class' => 'yii\grid\ActionColumn',
                'header' => 'Actions',
                'template' => '{view} {update} {delete}',
                'headerOptions' => ['width' => '20%', 'class' => 'activity-view-link',],
                'contentOptions' => ['class' => 'padding-left-5px'],
                'buttons' => [
                    'view' => function ($url, $model, $key) {
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>','#', [
                            'class' => 'activity-view-link',
                            'title' => Yii::t('yii', 'View'),
                            'data-toggle' => 'modal',
                            'data-target' => '#activity-modal',
                            'data-id' => $key,
                            'data-pjax' => '0',

                        ]);
                    },

                ],

            ],
        ],
    ]); ?>


    <?php Pjax::end() ?>

    <?php $this->registerJs(
        'function init_click_handlers(){
       $(".activity-view-link").click(function(e) {
            var fID = $(this).closest("tr").data("key");
            $.get(
             "index.php?r=card%2Fview&id="+fID,
              {
              id: fID
              },
                function (data)
                {
                    $("#activity-modal").find(".modal-body").html(data);
                    $(".modal-body").html(data);
                    $("#activity-modal").modal("show");
                }
            );
        });

}

init_click_handlers();
$("#books").on("pjax:success", function() {
  init_click_handlers();
});

 $(".im").click(function() {
             $(this).toggleClass("bigger");
        });

');?>

    <?php Modal::begin([
        'size' => Modal::SIZE_LARGE,
        'options' => ['class'=>'slide'],
        'id' => 'activity-modal',
        'header' => '<h4 class="modal-title">Загрузка...</h4>',
        'footer' => '<a href="#" class="btn btn-primary" data-dismiss="modal">закрыть</a>',

    ]); ?>

    <?php Modal::end(); ?>

</div>
