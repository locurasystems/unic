<?php
/**
 * Created by PhpStorm.
 * User: bhoo
 * Date: 3/9/14
 * Time: 1:40 AM
 */

namespace Unic\Controllers;

use Phalcon\Mvc\Controller,
    Unic\Models\Test,
    Unic\Models\Questions,
    Unic\Models\Module,
    Unic\Models\TestHasModule,
    Phalcon\Mvc\View,
    Unic\Functions,
    Unic\Examination\Examination;
use \Phalcon\Mvc\Model\Message;

use Phalcon\Mvc\Model\MetaData\Session;
use Unic\Mail\Exception;
use Unic\Video\Video;
use Phalcon\Http\Response;

class DeveloperController extends ControllerBase
{
    function TestingAction()
    {
//        $Test=$this->request->getPost('Test');
        $Quest=new Examination();
        /* Save Test under Session */
        $SessionModule= $Quest->getModuleIDByTestID(1);
        $arr1=explode(',',$SessionModule);
        $array=array_flip($arr1);
        $array=array_fill_keys(array_keys($array),0);
        $this->session->set('module',$array);
        /* option module marks */
        $option=array('option'=>"3,2",
        'option2'=>"1,2",
        'option3'=>"1,2");
        $arr_conv=new Functions();
        foreach($option as $value)
        {
            $options=explode(',',$value);
            $Opt=$arr_conv->array_column(array($options),'1','0');
            $key=array_keys($Opt);
            print_r($key[0]);
            print_r($Opt[$key[0]]);
            $key[0];
            if(array_key_exists($key[0],$_SESSION['module']))
            {
                 $_SESSION['module'][$key[0]] += 2;
            }
        }
        print_r($_SESSION);

        $this->view->disable();
    }
} 