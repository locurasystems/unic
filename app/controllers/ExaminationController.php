<?php
/**
 * Created by PhpStorm.
 * User: bhoo
 * Date: 2/19/14
 * Time: 1:40 PM
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

use Unic\Mail\Exception;
use Unic\Video\Video;
use Phalcon\Http\Response;

class ExaminationController extends  ControllerBase
{
    public function AddTestAction()
    {
        $values=$_POST;
        $testName=$values['testName'];
        $testCreatorID=$values['testCreatorID'];
        $testStartDate1=$values['testStartDate'];
        $testIsActive=$values['testIsActive'];
        $testStartDate=implode('-',array_reverse(explode('/',$testStartDate1)));
        $test= new Test();
        $test->testCreaterID=$testCreatorID;
        $test->testName=$testName;
        $test->testStartDate=$testStartDate;
        $test->testIsActive=$testIsActive;
        $test->testCreatedAt=date("Y-m-d H:i:s");
       if(!$test->save())
       {
           foreach ($test->getMessages() as $message)
           {
               echo $message->getMessage(), "<br/>";
           }
           exit;
       }
        return $this->response->redirect('dashboard/createTest');
    }
    public function AddQuestionsAction()
    {
        $values=$_POST;
        $questionModuleID=$values['questionModuleID'];
        $questionText=$values['questionText'];
        $questionOptions=json_encode($values['questionOptions']);
        $questionMarks=json_encode($values['questionMarks']);
        $question=new Questions();
        $question->questionModuleID=$questionModuleID;
        $question->questionOptions=$questionOptions;
        $question->questionMarks=$questionMarks;
        $question->questionText=$questionText;
        $success=$question->save();
        if(!$success)
        {

            foreach ($question->getMessages() as $message)
            {
                echo $message->getMessage(), "<br/>";
            }
            exit;

        }
        return $this->response->redirect('dashboard/createTestQuestion');
    }
    public function AddModuleAction()
    {
        $values=$this->request->getPost();
        $moduleName=$values['moduleName'];
        $moduleType=$values['moduleType'];
        $test_id=$values['test_id'];
        $module=new Module();
        $module->moduleName=$moduleName;
        $module->moduleType=$moduleType;
        if(!$module->save())
        {
            foreach ($module->getMessages() as $message)
            {
                echo $message->getMessage(), "<br/>";
            }
        }
        $module_id=$module->module_id;
       $test=new TestHasModule();
        $test->test_id=$test_id;
        $test->module_id=$module_id;
        $test->save();


        return $this->response->redirect('dashboard/createModule');
    }

    public function GetQuestions()
    {
//        $uid=$this->auth->getID;
     $data=Questions::getQuestions();
       return $data;
    }
    public function GetModuleByTestIDAction()
    {
        $id=$this->request->getPost("id","int");
        $data=TestHasModule::find(array(
           "column"=>array("module_id"),
            "conditions"=>"test_id=:id:",
            "bind"=>array("id"=>$id)
        ));
        foreach($data as $value)
        {
            $module=Module::find(array(
                "column"=>array("module_id","moduleName"),
                "conditions"=>"module_id = :id:",
                "bind"=>array("id"=>$value->module_id)
            ));
            foreach($module as $result)
            {
                $resData[]=array("id"=>$result->module_id,"name"=>$result->moduleName);
            }
        }
        echo json_encode($resData);
        $this->view->disable();

    }

    public function TryTestAction($start=0)
    {

         $test=$this->request->getPost('test');
        $this->view->setVar('Test',$test);
    }

    public function SelectTestAction()
    {
        $uid=$this->auth->getID();
        $test=Test::find(array(
            "columns"=>array("test_id","testName"),
            "conditions"=>"testCreaterID = $uid",
            "order"=>"testName"
             ))->toArray();
        $this->view->setVar('test',$test);
        $this->view->setLayout('dashboard');
    }
    public function LoadNextQuestionSetAction()
    {
        $a=new Examination();
        $options=$this->request->getPost();

        /* Getting all options and module id */
        $total=$options['total'];
        /* total number of options */
        $test_id=$options['test_id'];
        /* Get test id*/
        unset($options['test_id'],$options['total']);/*remove total and test_id in the $option*/
        /* Condition for $option has any values */
        $arr_conv=new Functions();
        if($options)
        {
            foreach($options as $value)
            {
                $opts=explode(',',$value);
                $Opt=$arr_conv->array_column(array($opts),'1','0');
                $key=array_keys($Opt);
                $key[0];
                if(array_key_exists($key[0],$this->session->get('module')))
                {
                    $_SESSION['module'][$key[0]] += $Opt[$key[0]];
                }
            }
        }
        $session=json_encode($this->session->get('module'));
        $moduleIds=$a->getModuleIDByTestID($test_id);
        $question=$a->getNextQuestionSet($moduleIds,$total);
        $data1=json_encode($question);
        $count=Questions::query()
            ->where("questionModuleID IN($moduleIds)")
             ->execute()
             ->count();
       $data='{"data":'.$data1.',"current":'.$total.',"session":'.$session.',"count":'.$count.'}';
        echo $data;
        $this->view->disable();
    }
    public function LoadQuestionSetAction()
    {
        $Test=$this->request->getPost('TestID');
        $Quest=new Examination();
        /* Save Test under Session */
        $Module= $Quest->getModuleIDByTestID($Test);/*Getting module Ids in format of 1,2,3,.. */
        $arr=explode(',',$Module);/*convert string module IDs to array */
        $arr=array_flip($arr);/* Flip values to key*/
        $arr=array_fill_keys(array_keys($arr),0);/* Setting all values initial 0*/
        $this->session->set('module',$arr);/*To load module in to session*/
        $this->session->set('Test',$Test);
        $Question=$Quest->getNextQuestionSet($Module,0);
        $count=Questions::query()
            ->where("questionModuleID IN($Module)")
            ->execute()
            ->count();
        $Question='{"quest":'.json_encode($Question).',"count":'.$count.'}';
        echo $Question;
        $this->view->disable();
    }
    public function TryTestResultAction()
    {
        $result=$this->session->get('module');
        $test=$this->session->get('Test');
        $this->view->setVar('module',$result);
        $this->view->setVar('test',$test);
        $this->view->setLayout('dashboard');
    }


} 