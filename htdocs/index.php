<?php

include_once('../vendor/autoload.php');

\PMVC\Load::plug([
    'controller'=>null
    ,'dispatcher'=>null
    ,'error'=>['all']
    ,'debug'=>null
    ,'dev'=>null
    ,'dotenv'=>[(is_file('../.env.pmvc')? '../.env.pmvc' : '../.env.sample')]
    ,'app_action_router'=>null
    ,'view_config_helper'=>null
]);

$controller = \PMVC\plug('controller');
if($controller->plugApp()){
    $controller->process();
}

phpinfo();
