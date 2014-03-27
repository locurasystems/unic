<?php
namespace Unic\Controllers;
use Phalcon\Mvc\Controller,
    Phalcon\Mvc\View;
use Phalcon\Http\Response;
use Unic\Models\Course;
Use Unic\Database\Tree;


class CourseController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {

    }
	public function createAction()
	{
		$a=new Tree();
        $a->Tree('course_categories','id','name','lft','rgt','parent');
        $b=$a->get_leaf_nodes();
        echo '<pre>';
        print_r($b);

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



