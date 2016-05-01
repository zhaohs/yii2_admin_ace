<?php
/**
 * Created by PhpStorm.
 * User: allen
 * Date: 16/4/29
 * Time: 22:17
 */
namespace app\modules\menu\models;

use Yii;
use yii\base\Model;
use app\libs\Constants;
class Menu extends \yii\db\ActiveRecord
{
    const CachePrefix = 'menu_';

    public function behaviors()
    {
        return [
            'treeBehavior'=>['class'=>'app\behaviors\TreeBehavior']
        ];
    }

    public function init()
    {
        $this->target=Constants::Target_Self;
        $this->status = Constants::Status_Enable;
        parent::init();
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'menu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id', 'category_id', 'name', 'url'], 'required'],
            [['parent_id', 'status', 'sort_num'], 'integer'],
            [['name', 'target', 'category_id'], 'string', 'max' => 64],
            [['url', 'description', 'thumb'], 'string', 'max' => 512]
        ];
    }

    public static function getAttributeLabels($attribute = null)
    {
        $items = [
            'id' => 'ID',
            'parent_id' => '父结点',
            'category_id' => '分类',
            'name' => '名称',
            'url' => '链接地址',
            'target' => '打开方式',
            'targetText' => '打开方式',
            'description' => '描述',
            'thumb' => '图片',
            'status' => '状态',
            'statusText' => '状态',
            'sort_num' => '排序',
        ];
        return ArrayHelper::getItems($items, $attribute);
    }
    public  function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => '父结点',
            'category_id' => '分类',
            'name' => '名称',
            'url' => '链接地址',
            'target' => '打开方式',
            'targetText' => '打开方式',
            'description' => '描述',
            'thumb' => '图片',
            'status' => '状态',
            'statusText' => '状态',
            'sort_num' => '排序',
        ];
    }



    public function getTargetText()
    {
        return Constants::getTargetItems($this->target);
    }


    private static function getArrayTreeInternal($category, $parentId = 0, $level = 0)
    {
        $children = self::findAll(['category_id'=>$category,'parent_id'=>$parentId],'sort_num asc');
        $items =[];
        foreach ($children as $child)
        {
            $child->level=$level;
            $items[$child['id']]=$child;
            $temp = self::getArrayTreeInternal($category,$child->id, $level + 1);
            $items = array_merge($items, $temp);
        }
        return $items;
    }

    public static function getMenusByCategory($category,$fromCache = true)
    {
        $cachekey = self::CachePrefix.$category;

        $values = self::getArrayTreeInternal($category,0,0);
        /* $values = $fromCache? LuLu::getCache($cachekey) : false;

         if($values===false)
         {
             $values = self::getArrayTreeInternal($category,0,0);
             LuLu::setCache($cachekey, $values);
         }*/
        return $values;
    }

    public static function clearCachedMenus($category)
    {
        $cachekey = self::CachePrefix.$category;
        LuLu::deleteCache($cachekey);
    }

    public static function getChildren($category,$parentId,$status=null)
    {
        $items = [];
        $menus = self::getMenusByCategory($category);
        foreach ($menus as $menu)
        {
            if($menu->parent_id === $parentId)
            {
                if($status && $menu->status!==1)
                {
                    continue;
                }
                $items[]=$menu;
            }
        }
        return $items;
    }

    public static function getArrayTree($category)
    {
        return self::getMenusByCategory($category);
    }

    public static function getMenuHtml($category,$parentId)
    {
        $items = self::getChildren($category,$parentId,1);

        return self::getMenuHtmlInternal($category, $items);
    }

    public static function activeMenu($url) {
        $actionId = \Yii::$app->controller->action->uniqueId;
        $urlArr = explode('?', $url);
        $url = $urlArr[0];
        $url = trim($url, '/');
        if (strpos($actionId, $url) !== false) {
            return true;
        }
        return false;

    }

    private static function getMenuHtmlInternal($category,$items)
    {
        $html='';
        foreach ($items as $menu)
        {
            $children = self::getChildren($category,$menu['id'],1);
            //根据当前路由打开
            $style = $menuClass = $navShow = '';
            foreach ($children as $item)
            {
                if (self::activeMenu($item->url)) {
                    $style = ' style="display:block"';
                    $navShow = 'nav-show';
                    $menuClass = 'active';
                    break;
                }
            }
            if(count($children)>0)
            {
                $html .= '<li class="' . $menuClass . '">';
                $html .= '<a href="' . $menu->url .'" class="dropdown-toggle">';
                $html .= '<i class="menu-icon fa fa-desktop"></i>';
                $html .= '<span class="menu-text">' .$menu->name. '</span>';
                $html .= '<b class="arrow fa fa-angle-down"></b>';
                $html .= '</a><b class="arrow"></b>';
                $html .= '<ul class="submenu ' . $navShow . '" ' . $style . '>';
                $html .= self::getMenuHtmlInternal($category, $children);
                $html .= '</ul>';
                $html .= '</li>';
            }
            else
            {
                $html .= '<li class="' . $menuClass . '">';
                $html .= '<a href="' . $menu->url .'">';
                $html .= '<i class="menu-icon fa fa-list-alt"></i>';
                $html .= '<span class="menu-text">' .$menu->name. '</span>';
                $html .= '</a>';
                $html .= '<b class="arrow"></b>';
                $html .= '</li>';
            }
        }
        return $html;
    }


    public static function getAdminMenu()
    {
        $html='';

        $adminUrl = Resource::getAdminUrl();

        $action = LuLu::getApp()->requestedAction;
        $urlArray = explode('/', $action->uniqueId);

        $showHome='';

        $roots = self::getChildren('admin', 0, 1);
        foreach ($roots as $menu)
        {
            $url= $menu['url']==='#'? '#':Url::to([$menu['url']]);
            $title='<span class="da-nav-icon"><img src="'.$adminUrl.'/images/icons/black/32/'.$menu['thumb'].'" alt="'.$menu['name'].'" /></span>'.$menu['name'];

            $html .= '<li id="menu-item-'.$menu['id'].'" '.$showHome.' class="menu-item"><a href="'.$url.'">'.$title.'</a>';
            $showHome=' style="display:none;"';

            $children = self::getChildren('admin',$menu['id'],1);
            if(count($children)>0)
            {
                $opened=false;
                $childHtml='';
                foreach ($children as $child)
                {
                    $menuUrlArray = explode('/',trim($child['url'],'/'));
                    if(in_array($urlArray[0],$menuUrlArray))
                    {
                        $opened=true;
                    }
                    $childUrl= $child['url']==='#'? '#':Url::to([$child['url']]);
                    $childHtml.='<li id="menu-item-'.$child['id'].'"><a href="'.$childUrl.'" target="mainFrame">'.$child['name'].'</a></li>';
                }

                //$html.= $opened?'<ul>':'<ul class="closed">';
                $html.= '<ul>';
                $html.=$childHtml;
                $html.='</ul>';
            }
            $html.='</li>';
        }

        return $html;
    }

    public function beforeDelete()
    {
        //删除子节点
        $childrenIds = $this->getChildrenIds();
        self::deleteAll(['id'=>$childrenIds]);

        return true;
    }

    public function clearCache()
    {
        self::clearCachedMenus($this->category_id);
    }

}