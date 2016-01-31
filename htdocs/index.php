<?php
include_once('../vendor/autoload.php');
PMVC\Load::mvc();
use PMVC\ActionController as mvc;

$options = array(
   _PLUGIN=>array(
        'dispatcher'=>null
        ,'error'=>null
        ,'debug'=>null
        ,'dotenv'=>array('envFile'=>'../.env')
        ,'routing'=>null
    )
    ,_ERROR_REPORTING=>E_ALL
);

$controller = new mvc($options);
if($controller->plugApp()){
    $controller();
}


