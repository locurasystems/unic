<?php

    namespace Unic\Controllers\Trainee;
    use Phalcon\Mvc\Controller;
    use Unic\Models\Course;

    class TraineeBase extends Controller
    {

        public function afterExecuteRoute()
        {
            $this->view->setViewsDir($this->view->getVIewsDir() . 'trainee/');
        }

        public function beforeExecuteRoute ()
        {
            if($this->request->has('courseID'))
            {
                if(Course::findFirst($this->request->get('courseID')) && is_numeric($this->request->get('courseID')))
                {

                }
                else
                {
                    echo 'Page not Found';
                    $this->view->disable();
                }
            }
        }

    }

