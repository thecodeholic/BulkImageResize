<?php
/**
 * User: TheCodeholic
 * Date: 2/9/2020
 * Time: 3:10 PM
 */
require_once __DIR__ . '/vendor/autoload.php';

use tc\bulkimageresize\ImageResize;

$resizer = new ImageResize();
$resizer->onBeforeResize(function($path){
    echo "Before resize ".$path;
});
$resizer->onAfterResize(function($path){
    echo "After resize ".$path;
});
$resizer->resizeAllImages('./images');
