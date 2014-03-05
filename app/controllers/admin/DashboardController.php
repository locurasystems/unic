<?php
/**
 * Created by PhpStorm.
 * User: bhoo
 * Date: 2/12/14
 * Time: 1:23 PM
 */

namespace Unic\Controllers\Admin;
use Phalcon\Mvc\Controller,
    Phalcon\Mvc\View,
    Unic\Models\CourseSpec;

class DashboardController extends ControllerBase
{
    public function IndexAction()
    {

    }
    public function viewCourseAction()
    {
        $test=new CourseSpec;
        $this->view->setVar("test",$test->getCourseDetail());
//        $this->view->disable();

    }

    public function viewExamAction()
    {

    }

} 