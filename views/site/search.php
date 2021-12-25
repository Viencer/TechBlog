<?php
use yii\widgets\LinkPager;
use yii\helpers\Url;

?>
<!--main content start-->
<div class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <?php
                echo LinkPager::widget([
                    'pagination' => $pagination,
                ]);
                ?>
                
            </div>
           <?= $this->render('/partials/sidebar',[
               'popular'=>$popular,
               'recent'=>$recent,
               'categories'=>$categories,
               'tags'=>$tags,
   
           ]);?>
        </div>
    </div>
</div>
<!-- end main content-->