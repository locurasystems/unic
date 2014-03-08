<?php

namespace Unic\Controllers;
use Phalcon\Mvc\Controller,
    Unic\Models\Module,
    Phalcon\Mvc\View;

use Unic\Video\Video;
use Phalcon\Http\Response;

class DashboardController extends ControllerBase {

	public function indexAction()
	{
		$ou=array();
		$input=realpath('/Library/WebServer/Documents/unic/public/videos').'/A.flv';
		$output=realpath('/Library/WebServer/Documents/unic/public/videos').'/b.avi';
		$pr=realpath('/Library/WebServer/Documents/unic/public/videos').'/prg.txt';		
// 		echo exec("ffmpeg -i ".$input ." -r 24 ".$output);
//		echo "<pre>";
//		print_r(ini_get_all());
//		$this->view->disable();

	}

	public function uploadImageAction($text)
	{
		echo $text;
	}
	public function mediaLibraryAction()
	{
		 if($this->request->isAjax())
		 {
		 	$this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
		 }
	}
	public function addMediaAction()
	{

	}

	public function uploadMediaAction()
	{
		// Check if the user has uploaded files
		if ($this->request->hasFiles() == true) {
			 
			// Print the real file names and sizes
			foreach ($this->request->getUploadedFiles() as $file)
			{
				$data[]=(object) array('name'=>$file->getName(),'size'=>$file->getSize(),'url'=>$this->url->get('public/videos/').$file->getName(),'thumbnailUrl'=>$this->url->get('public/videos/').$file->getName(),'deleteUrl'=>$this->url->get('public/videos/').$file->getName(),'deleteType'=>'DELETE');
				//Move the file into the application
				$file->moveTo('videos/' . $file->getName());
			}
			$files=array('files'=>$data);
			
			$file=(object) $files;
			
			$response = new Response();
			$response->setContent(json_encode($file));
			return $response;
		}
		 
	}
	public function createCourseAction()
	{

	}

	public function paymentReciptAction() {

	}

	public function uploadVideoAction()
	{


	}

	public function uploadAction() {

	}

	public function saveVideoAction() 
	{
		//        $a = new Video($this->url->get('public/videos'));
		$ou=array();
		$input=realpath('/Library/WebServer/Documents/unic/public/videos').'/A.flv';
		$output=realpath('/Library/WebServer/Documents/unic/public/videos').'/b3.avi';
		$pr=realpath('/Library/WebServer/Documents/unic/public/videos').'/prg.txt';

		$pr2=realpath('videos').'/pr2.txt';

		foreach ($this->request->getUploadedFiles() as $file)
		{

			$f=  $file->getTempName();
			$a=exec("/usr/local/bin/ffmpeg -i ". $f. " -r 24 ". $output .' -progress '.$pr.'&',$ou);

			file_put_contents('videos/pr2.txt', $a,FILE_APPEND);

		}


		       $files = array('files' => $data);
		       $file = (object) $files;
		       $response = new Response();
		       $response->setContent(json_encode($file));
		       return $response;
    }

    public function createTestAction()
    {

    }
    /**
     *  calls createModule view
     */
    public function createModuleAction()
    {

    }


    /**
     *  For creating Question calls createQuestion view
     * By passing Module values
     */
    public function createTestQuestionAction()
    {
    $module=new Module();   /* Calling Module class in model */
    $list=$module->getModules();/* Fetch data from module table */
    $this->view->setVar('module',$list);
    }

    public function viewQuestionsAction()
    {
        $question=new ExaminationController();
        $this->view->setVar('question',$question->GetQuestions());
    }


}
?>



