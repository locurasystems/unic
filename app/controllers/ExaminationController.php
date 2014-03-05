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
    Phalcon\Mvc\View;
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
        $values=$_POST;
        $moduleName=$values['moduleName'];
        $moduleType=$values['moduleType'];
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
        return $this->response->redirect('dashboard/createModule');
    }

    public function GetQuestions()
    {
     $data=Questions::getQuestions();
       return $data;

    }

} 