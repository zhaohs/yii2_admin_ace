<?php
namespace app\modules\rbac\rules;

class BooleanRule extends Rule
{

    public function execute($permission, $params = [], $role = null)
    {
        if ($permission['value'])
        {
            return true;
        }
        return false;
    }
}