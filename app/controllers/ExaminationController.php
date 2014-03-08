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
//        $this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
        $st=$this->request->getPost('start');
        if(isset($st))
        {
            $start=$st;
        }
//        $data=Questions::;
//         $this->view->setVar('question',$data);
        $this->view->setLayout('dashboard');

    }

    public function SelectTestAction()
    {
        $this->view->setLayout('dashboard');
    }

    public function LoadNextQuestionSetAction()
    {
        $a=new Examination();
        $c=$a->getNextQuestionSet('22');
        echo json_encode($c);
        $this->view->disable();
    }
    public function LoadQuestionSetAction()
    {
        $Quest=new Examination();
        $Question=$Quest->getNextQuestionSet();
        echo json_encode($Question);
        $this->view->disable();
    }

} 