<?php

namespace app\modules\dict;


class Module extends \yii\base\Module
{
    public function init()
    {
        parent::init();
        $this->id='dict';
        $this->defaultRoute='/dict/dict-category';
    }

}
