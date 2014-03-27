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
use Unic\Models\CourseCategory;


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
    public function manageCategoryAction()
    {
        $compiler = new \Phalcon\Mvc\View\Engine\Volt\Compiler();
        $this->view->cache(false);
    }

    public function createCourseCategoryAction()
    {
        $this->view->disable();
        $categories=CourseCategory::find()->toArray();
        $categories=json_encode($categories);
        echo $categories;

    }
    public function viewExamAction()
    {

    }

    public function addPermissionAction()
    {

    }

} 