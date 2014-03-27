<?php
namespace Unic\Controllers\Trainee;

use Phalcon\Mvc\Controller,
    Phalcon\Mvc\View;
use Phalcon\Http\Response;
use Unic\Models\Course;
Use Unic\Database\Tree;
use Unic\Models\CourseVideos;
use Unic\Trainer\CourseFunction;
class CourseController extends TraineeBase
{
    public function indexAction()
    {

    }
    public function listCourseAction()
    {

        $currentDate=date('Y-m-d');
        $course=Course::query()
            ->where("active  = 1")
            ->andWhere("startAt >= '$currentDate'")
            ->join("Unic\Models\CourseSpec")
            ->columns(array('id','name',
                            'creatorID','code',
                            'price','page',
                            'startAt','createdAt',
                            'description','about',
                            'instructors','length',
                            'effort'))
            ->execute()
            ->toArray();
        $this->view->setVar('course',$course);
    }

    public function courseDetailsAction ()
    {
        $courseID=$this->request->get('courseID');
        $this->view->setVar('courseID',$courseID);

    }
}




















