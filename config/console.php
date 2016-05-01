<?php


$config = require(__DIR__ . '/web.php');

$config['id'] = 'basic-console';
$config['controllerNamespace'] = 'app\commands';
unset($config['components']['request']);
unset($config['components']['user']);
unset($config['components']['errorHandler']);
return $config;