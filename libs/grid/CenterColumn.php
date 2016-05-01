<?php
namespace app\libs\grid;

class CenterColumn extends DataColumn
{

    public $attribute = 'statusText';
    

    public function init()
    {
        parent::init();
        $this->contentOptions=['class'=>'align-center'];
    }
}