<?php
include_once('../vendor/autoload.php');
\PMVC\Load::plug([
    'controller'=>null
    ,'dispatcher'=>null
    ,'error'=>null
    ,'debug'=>null
    ,'dotenv'=>array('envFile'=>'../.env')
    ,'app_action_router'=>null
]);
$controller = \PMVC\plug('controller',[_ERROR_REPORTING=>E_ALL]);
if($controller->plugApp()){
    $controller->process();
}
