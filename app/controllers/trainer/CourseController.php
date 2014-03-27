<?php
namespace Unic\Controllers\Trainer;

use Phalcon\Mvc\Controller,
    Phalcon\Mvc\View;
use Phalcon\Http\Response;
use Unic\Models\Course;
Use Unic\Database\Tree;
use Unic\Models\CourseVideos;
use Unic\Trainer\CourseFunction;


class CourseController extends TrainerBase
    {


    public function indexAction()
    {
        $a=new CourseFunction();
        echo $a->saveStep1();
        $this->view->disable();

    }
    public function createAction()
    {
        $params   = $this->dispatcher->getParams ();
        $courseID = $this->request->get ('courseID', 'int');

        switch($params['step'])
        {
            case '/1':
                $this->view->pick('course/create_step_1');
                break;

            case '/2':

                $this->view->setVar('courseID',$courseID);
                $this->view->pick('course/create_step_2');
                break;

            case '/3':
                $media=CourseVideos::query()
                    ->columns(array('videoID','courseID','filename'))
                    ->join('Unic\Models\Videos','Unic\Models\Videos.id=1')
                    ->where('courseID="2"')
                    ->execute()->toArray();

                $this->view->setVar('videos',$media);
                $this->view->pick('course/create_step_3');
                break;
        }
    }

    public function saveAction()
    {
        $params=$this->dispatcher->getParams();
        $course=new CourseFunction();

        switch($params['step'])
        {
            // IF STEP =1
            case '/1':
                $result=$course->saveStep1();
                if($result)
                {
                    // return JSON on successfuly adding of course
                    echo json_encode(array(
                            'response' => $result,
                            'url'   => 'course/create/2?courseID='.$result
                    ));

                    $this->session->set('courseStepMessage','Course has been created sucessfuly.Now its time to describe course properties');
                    $this->session->set('courseStepMessageClass','alert-success');

                }
                else
                    // return JSON on course adding failed
                echo json_encode(array(
                    'response' => 'error',
                    'url'   => 'course/create/1'
                ));
                break;

            // IF STEP =2
            case '/2':
                $result=$course->saveStep2();

                if($result)
                {
                    // return JSON on successfuly adding of course
                    echo json_encode(array(
                        'response' => $result,
                        'url'   => 'course/create/3'
                    ));

                    $this->session->set('courseStepMessage','Course has been created sucessfuly.Now its time to describe course properties');
                }
                else
                    // return JSON on course adding failed
                    echo json_encode(array(
                        'response' => 'error',
                        'url'   => 'course/create/1'
                    ));
                break;
        }

        $this->view->disable();
    }
    public function createcourseAction()
    {
        $description=$this->request->getPost('description');
        $about=$this->request->getPost('about');
        $estimated_effort=$this->request->getPost('estimated_effort');
        $length=$this->request->getPost('length');
        $scope=$this->request->getPost('scope');
        $image=$this->request->getUploadedFiles('instructor_image');
        $instrutor_name=$this->request->getPost('instrutor_name');
        $about_instructor=$this->request->getPost('about_instructor');
        $instuctor_contact=$this->request->getPost('instuctor_contact');

    }
    public function videouploadAction()
    {

    }

    public function listCourseAction()
    {
        $courses=Course::query()
            ->where("creatorID = :user:")
            ->bind(array('user'=>$this->auth->getID()))
            ->execute()
            ->toArray();

        $this->view->setVar('courses',$courses);
    }
    public function viewCourse()
    {
        $course=Course::find()->toArray();

        return $course;
    }



    }



