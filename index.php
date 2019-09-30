<?php
$f3 = require('./lib/base.php');
$f3->set('LOCALES','./app/dict/');
$f3->set('FALLBACK','en');
if(file_exists('./LOCK'))
{
    require_once './app/functions.php';
}
else
{
    echo null;
}
require_once './router.php';
$f3->run();