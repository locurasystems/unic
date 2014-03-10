<?php
namespace Unic\Controllers;
use Phalcon\Mvc\Controller,
    Phalcon\Mvc\View;

use Unic\Models\Profiles;
use Unic\Models\Users;
use UploadHandler;
use Phalcon\Http\Response;
use Aws;
use Aws\Common\Enum\Size;
use Aws\Common\Exception\MultipartUploadException;
use Aws\S3\Model\MultipartUpload\UploadBuilder;
use Unic\Models\Videos;

class DashboardController extends ControllerBase {

	public function indexAction()
	{


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
	public function uploadMediaAction()
	{

	}

    public function listMediaAction()
    {
        $media=Videos::find()->toArray();
        $this->view->setVar('media',$media);




    }

	public function saveMediaAction()
	{

        // Check if the user has uploaded files
        if ($this->request->hasFiles() == true)
        {
            $media=new Videos();
            // Print the real file names and sizes
            foreach ($this->request->getUploadedFiles() as $file)
            {
                $data[]=(object) array('name'=>$file->getName(),'size'=>$file->getSize(),'url'=>$this->url->get('public/videos/').$file->getName(),'thumbnailUrl'=>$this->url->get('public/videos/').$file->getName(),'deleteUrl'=>$this->url->get('public/videos/').$file->getName(),'deleteType'=>'DELETE');
                //Move the file into the application
                $file->moveTo('videos/' . $file->getName());

                $media->filename=$file->getName();
                $media->uploader=$this->auth->getID();
                $media->verified='0';
                $media->save();
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

    public function testAction()
    {

        $this->view->disable();

    }


}
?>



