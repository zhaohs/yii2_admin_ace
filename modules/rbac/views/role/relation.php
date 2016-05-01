<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use app\modules\rbac\models\Permission;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\rbac\models\search\RelationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->title = '设定权限:'.$role['name'].'('.$role['id'].')' ;
$this->params['breadcrumbs'][] = ['label' => '角色管理', 'url' => ['role/index']];
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

            <div class="widget-box transparent" id="recent-box">
                <div class="widget-header">


                    <div class="widget-toolbar no-border" style="float:left">
                        <ul class="nav nav-tabs" id="recent-tab">
                             <li class="active">
                                  <a data-toggle="tab" href="#task-tab">基本权限</a>
                              </li>

                            <li>
                                <a data-toggle="tab" href="#member-tab">控制器权限</a>
                            </li>

                            <li>
                                <a data-toggle="tab" href="#comment-tab">系统权限</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="widget-body">
                    <div class="widget-main padding-4">
                        <div class="tab-content padding-8">

<div id="task-tab" class="tab-pane active">


    <div class="row controller">
        <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->
            <div class="center">
<?php foreach ($allPermissions[Permission::Category_Basic] as $permission):?>
    <?php $v = isset($rolePermissions[$permission['id']]) ? $rolePermissions[$permission['id']]['value'] : $permission->getDefaultValue();?>
                <div class="row">
                    <div class="col-xs-2">
                        <span> <label for="permission-<?php echo $permission['id']?>"><?php echo $permission['name']?></label></span>
                    </div>

                    <div class="col-xs-10">
                        <?php echo $this->render('_form/'. $permission['formView'], ['permission'=>$permission,'value'=>$v]);?>
                    </div>
                </div>
<?php endforeach;?>

            </div>

            <!-- PAGE CONTENT ENDS -->
        </div><!-- /.col -->
    </div><!-- /.row -->

</div>

                            <div id="member-tab" class="tab-pane">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <!-- PAGE CONTENT BEGINS -->
                                        <div class="center">
                                            <?php foreach ($allPermissions[Permission::Category_Controller] as $permission):?>
                                                <?php $v = isset($rolePermissions[$permission['id']]) ? $rolePermissions[$permission['id']]['value'] : $permission->getDefaultValue();?>
                                                <div class="row">
                                                    <div class="col-xs-2">
                                                        <span> <label for="permission-<?php echo $permission['id']?>"><?php echo $permission['name']?></label></span>
                                                    </div>

                                                    <div class="col-xs-10">
                                                        <?php echo $this->render('_form/'. $permission['formView'], ['permission'=>$permission,'value'=>$v]);?>
                                                    </div>
                                                </div>
                                            <?php endforeach;?>

                                        </div>

                                        <!-- PAGE CONTENT ENDS -->
                                    </div><!-- /.col -->
                                </div><!-- /.row -->


                                <!-- /section:pages/dashboard.members -->
                            </div><!-- /.#member-tab -->

                            <div id="comment-tab" class="tab-pane">


                                <div class="row">
                                    <div class="col-xs-12">
                                        <!-- PAGE CONTENT BEGINS -->
                                        <div class="center">
                                            <?php foreach ($allPermissions[Permission::Category_System] as $permission):?>
                                                <?php $v = isset($rolePermissions[$permission['id']]) ? $rolePermissions[$permission['id']]['value'] : $permission->getDefaultValue();?>
                                                <div class="row">
                                                    <div class="col-xs-2">
                                                        <span> <label for="permission-<?php echo $permission['id']?>"><?php echo $permission['name']?></label></span>
                                                    </div>

                                                    <div class="col-xs-10">
                                                        <?php echo $this->render('_form/'. $permission['formView'], ['permission'=>$permission,'value'=>$v]);?>
                                                    </div>
                                                </div>
                                            <?php endforeach;?>

                                        </div>

                                        <!-- PAGE CONTENT ENDS -->
                                    </div><!-- /.col -->
                                </div><!-- /.row -->

                            </div>
                        </div>
                    </div><!-- /.widget-main -->
                </div><!-- /.widget-body -->
            </div><!-- /.widget-box -->
        </div><!-- /.col -->
    </div><!-- /.row -->

    <div class="form-group">
        <?= Html::submitButton('Update', ['class' =>  'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end();?>