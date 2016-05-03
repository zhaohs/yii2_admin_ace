<?php
/**
 * Created by PhpStorm.
 * User: allen
 * Date: 16/4/29
 * Time: 22:17
 */
namespace app\modules\role\models;

use Yii;
use yii\base\Model;
use app\libs\Constants;
use app\modules\dict\models\Dict;

class RoleCity extends \yii\db\ActiveRecord
{
    const CachePrefix = 'role_city';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'role_city';
    }

}