<?php

use yii\helpers\Html;
use yii\helpers\VarDumper;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Article */
/* @var $form yii\widgets\ActiveForm */
?>

<style>
.center {
  margin: center;
  width: 60%;
  padding: 10px;
}
</style>


<div class="article-form">

    <?php $form = ActiveForm::begin(); ?>
    <br><br>
    <h1 class="center">Choose Tags</h1>
    <div class="center" style="width:500px;height:500px;border:1px solid #000;"><?= Html::checkboxList('tags', $selectedTags, $tags, ['class'=>'kv-row-select', 'multiple'=>true]) ?></div>
    <br>
    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-success'])?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
