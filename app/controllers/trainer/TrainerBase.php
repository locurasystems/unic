<?php

namespace Unic\Controllers\Trainer;
use Phalcon\Mvc\Controller;
use Unic\Models\Course;

class TrainerBase extends Controller
    {

    public function afterExecuteRoute()
    {
        $this->view->setViewsDir($this->view->getVIewsDir() . 'trainer/');
    }

    public function beforeExecuteRoute()
        {
            //TODO : beforeExecuteRoutes Exception for Trainer Base Controller
            if($this->request->has('courseID'))
            {
                if(!Course::findFirst($this->request->get('courseID')) || !is_numeric($this->request->get('courseID')))
                {
                    echo 'Page not Found';
                    $this->view->disable();
                }
            }
        }

    }

