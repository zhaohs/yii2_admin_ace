<?php
namespace app\libs\grid;

class DateTimeColumn extends DataColumn
{
    public $headerOptions=['width'=>'120px'];
    
    public $format =['datetime', 'php:Y-m-d H:m:s'];

    public function init()
    {
        parent::init();
    }
}