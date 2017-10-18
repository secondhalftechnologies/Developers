
<!-- Note by Ejaz -->
<!-- The link for the reference of this restfull api is "http://blog.aimanbaharum.com/2015/07/05/slim-framework-crud/" -->
<!-- Just go throw All the code in the reference link and you will understand the core functionality easily -->
<!-- End of Note by Ejaz -->

<?php

require_once '../include/DbHandler.php';
require_once '../include/Utils.php';
require '../vendor/autoload.php';

$app = new \Slim\Slim();
if(SLIM_DEBUG){
  $app->config('debug',true);
}


/**
* route test block
*/
$app->get('/', function () {
    echo "restfull api v1";
});
$app->get('/test/:name', function ($name) {
    echo "Hello, $name";
});


require './routes/Authentication.php';
require './routes/Farmers.php';


// Run Slim
$app->run();