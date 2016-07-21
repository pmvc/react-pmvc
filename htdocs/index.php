<?php
include_once('../vendor/autoload.php');
\PMVC\Load::plug([
    'controller'=>null
    ,'dispatcher'=>null
    ,'error'=>['all']
    ,'debug'=>null
    ,'dotenv'=>['../.env']
    ,'app_action_router'=>null
]);
$controller = \PMVC\plug('controller');
if($controller->plugApp()){
    $controller->process();
}
