<?php
namespace app\libs\grid;

class SortColumn extends DataColumn
{

    public $attribute = 'sort_num';
    public $headerOptions=['width'=>'50px'];

    public function init()
    {
        parent::init();
        
        //$this->contentOptions=['class'=>'align-center'];
    }
}