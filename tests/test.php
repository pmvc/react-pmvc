<?php

namespace PMVC\App\react;

use PMVC\TestCase;

class ReactAppTest extends TestCase
{
    /**
     * @runInSeparateProcess
     */
    function testApp()
    {
        \PMVC\initPlugin([
            'controller'=>null
            ,'dispatcher'=>null
            ,'error'=>null
            ,'debug'=>['output'=>'debug_cli']
            ,'dotenv'=>['.env.sample']
            ,'app_action_router'=>null
            ,'view_react'=>[
                'NODEJS'=>'vendor/bin/node'
            ]
        ]);
        $controller = \PMVC\plug('controller',[
            _RUN_APPS=>'apps'
            ,_TEMPLATE_DIR=>'vendor/pmvc-theme/hello_react'
        ]);
        if($controller->plugApp()){
            ob_start();
            $controller->process();
            $output = ob_get_contents();
            ob_end_clean();
        }
        $this->haveString('hello <!-- --> world',$output);
    }
}
