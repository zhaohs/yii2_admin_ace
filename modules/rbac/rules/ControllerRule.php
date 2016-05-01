<?php
namespace app\modules\rbac\rules;


class ControllerRule extends Rule
{

    public function execute($permission, $params = [], $role = null)
    {
        $actionId = isset($params['actionId']) ? $params['actionId'] : \Yii::$app->requestedAction->id;
        
        $actions = $permission['value'];
        if (in_array($actionId, $actions))
        {
            return true;
        }
        
        $method = \Yii::$app->request->method;
        $method = strtolower($method);
        if (in_array($actionId . ':' . $method, $actions))
        {
            return true;
        }
        
        return false;
    }
}