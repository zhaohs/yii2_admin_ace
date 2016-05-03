<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\libs\widgets\ActiveForm;
use app\modules\rbac\models\Permission;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\rbac\models\search\RelationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->title = '设定权限:'.$role['name'].'('.$role['id'].')' ;
$this->params['breadcrumbs'][] = $this->title;

?>
    <style>
        /* styling the grid page's grid elements */

        .center [class*="col-"] {
            margin-top: 2px;
            margin-bottom: 2px;
            padding-top: 4px;
            padding-bottom: 4px;
            text-overflow: ellipsis;

        }
        .tab-pane ul {
            list-style: none;
            margin:0px;
        }
        .tab-pane li {
            list-style: none;
            float: left;
            padding-left:4px;
            font-size: smaller;
        }
        .col-xs-10 {
            text-align: left;
        }

    </style>


<?php $form=ActiveForm::begin();?>
    <div class="row">
        <div class="col-sm-12">
            <div id="comment-tab" class="tab-pane">


                <div class="row">
                    <div class="col-xs-12">
                        <!-- PAGE CONTENT BEGINS -->
                        <div class="center">
                            <div class="row">
                                <div class="col-xs-2">
                                    <span> <label>城市列表</label></span>
                                </div>

                                <div class="col-xs-10">
                                    <ul class="da-form-list inline">
                                        <?php
                                        foreach ($cityList as $city)
                                        {
                                            ?>
                                            <li><label><input type="checkbox" name="RoleCity[city][]" value="<?php echo $city->name;?>" <?php if(in_array($city->name, $checkedCityList)){echo 'checked';}?>><?=$city->value;?></label></li>

                                        <?php }?>

                                    </ul>
                                </div>
                            </div>

                        </div>

                        <!-- PAGE CONTENT ENDS -->
                    </div><!-- /.col -->
                </div><!-- /.row -->

            </div>
        </div><!-- /.col -->
    </div><!-- /.row -->

<?= $form->defaultButtons($model) ?>

<?php ActiveForm::end();?>