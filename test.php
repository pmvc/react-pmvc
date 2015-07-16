<?php
\PMVC\Load::mvc();
class ReactAppTest extends PHPUnit_Framework_TestCase
{
    function testApp()
    {
        $options = array(
           _PLUGIN=>array(
                'dispatcher'=>null
                ,'error'=>null
                ,'debug'=>null
                ,'dotenv'=>array('envfile'=>'.env.sample')
                ,'routing'=>null
            )
            ,_ERROR_REPORTING=>E_ALL
        );

        $controller = new \PMVC\ActionController($options);
        $controller->store(array(
            _RUN_PARENT=>'vendor/pmvc-app'
            ,_TEMPLATE_DIR=>'vendor/pmvc-theme/hello_react'
            ,'NODE'=>'vendor/bin/node'
        ));
        if($controller->plugApp()){
            ob_start();
            $controller->process();
            $output = ob_get_contents();
            ob_end_clean();
        }
        $this->assertContains('data-reactid',$output);
    }
}
