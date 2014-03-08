<?php
namespace Unic\Examination;
use Unic\Models\Questions,
    Unic\Models\TestHasModule,
    Unic\Models\Test,
    Unic\Models\Module;

class Examination
{
    private $testID     ='';

    private $perPage    ='10';


    public function getNextQuestionSet($start=0)
    {
        $modules=TestHasModule::query()
                    ->columns('module_id')
                    ->where('test_id = :test:')
                    ->bind(array('test'=>'1'))
                    ->execute()
                    ->toArray();

        $question=Questions::query()
                    ->where('questionModuleID IN(1)')
                    ->limit(20,$start)
                    ->execute()
                    ->toArray();

        return $question;
    }

}
?>