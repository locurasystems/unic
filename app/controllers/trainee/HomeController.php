<?php
namespace Unic\Controllers\Trainee;
use Phalcon\Mvc\Controller,
    Phalcon\Mvc\View;
use Phalcon\Http\Response;
use Unic\Models\Course;


class HomeController extends TraineeBase
{
    public function indexAction()
    {
        $this->view->setLayout('course');
    }


} 