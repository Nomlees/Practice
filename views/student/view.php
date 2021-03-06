<?php

use yii\helpers\Html;
use yii\widgets\DetailView;


/* @var $this yii\web\View */
/* @var $model app\models\Student */

$this->title = $model->Name;
$this->params['breadcrumbs'][] = ['label' => 'Students', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID',
            'Name',
            'Email:email',
            'Surname',
            'Code',
            [
                'label' => 'Группа',
                'value' =>
                    function ($m) {
                        return $m->group->Title;
                    }
            ],
            [

                'label'=>'Студенты',
                'formt' => 'html',
                'value'=>
                    function ($m) {

                        $string = '';


                        foreach ($m->links as $link){
                            $link->delete();
                        }

                        foreach ($m->links as $link) {
                            $string .= $link->subject->Title . ' ';

                        }

                        return $string;
                    }
            ],

        ]
    ]) ?>

</div>
