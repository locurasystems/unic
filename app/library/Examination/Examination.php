<?php
namespace Unic\Examination;
use Unic\Models\Questions,
    Unic\Models\TestHasModule,
    Unic\Models\Test,
    Unic\Models\Module,
    Phalcon\Http\Request as request;

class Examination
{
    private $testID     ='';

    private $perPage    ='10';

    public function getModuleIDByTestID($testID)
    {
        $modules=TestHasModule::query()
            ->columns('module_id')
            ->where('test_id = :test:')
            ->bind(array('test'=>$testID))
            ->execute()
            ->toArray();
        $module="";
        foreach($modules as $value)
        {
            $module .=$value['module_id'].",";
        }
        $Module=rtrim($module,",");
        return $Module;
    }
    public function getNextQuestionSet($Module,$start)
    {
               $question=Questions::query()
                    ->where("questionModuleID IN($Module)")
                    ->limit(10,$start)
                    ->execute()
                    ->toArray();
        return $question;
    }

    public function getTestNameByID($test_id)
    {
        $testName=Test::findFirst($test_id)
                   ->toArray();
        return $testName;
    }
    public function getModuleNameByID($module_id)
    {
        $moduleName=Module::query()
            ->where("module_id = $module_id")
             ->execute()
            ->toArray();
        return $moduleName;

    }

    public function saveMarks()
    {
        $request=new \Phalcon\Http\Request();

        if($request->isPost())
        {
            $post=$request->getPost();

        }

        throw new \Exception('Invalid Request');
    }

}