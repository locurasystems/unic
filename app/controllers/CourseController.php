<?php
namespace Unic\Controllers;

class CourseController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {


    }
	public function createAction()
	{
		
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

}



