<?php
$f3 = require('./lib/base.php');
$f3->set('LOCALES','./app/dict/');
$f3->set('FALLBACK','en');
require_once './app/functions.php';
require_once './router.php';
$f3->run();