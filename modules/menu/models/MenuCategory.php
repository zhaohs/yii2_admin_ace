<?php

namespace app\modules\menu\models;

use Yii;
use app\libs\ArrayHelper;

/**
 * This is the model class for table "lulu_menu_category".
 *
 * @property string $id
 * @property string $name
 * @property string $description
 */
class MenuCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'menu_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'name'], 'required'],
            [['id', 'name'], 'string', 'max' => 64],
            [['description'], 'string', 'max' => 512],
            [['id'], 'unique']
        ];
    }

    public static function getAttributeLabels($attribute = null)
    {
        $items = [
            'id' => '标识',
            'name' => '名称',
            'description' => '描述',
        ];
        return ArrayHelper::getItems($items, $attribute);
    }

    public  function attributeLabels()
    {
        return [
            'id' => '标识',
            'name' => '名称',
            'description' => '描述',
        ];

    }
    
    public function beforeDelete()
    {
        Menu::deleteAll(['category_id'=>$this->id]);
        return true;
    }
}
