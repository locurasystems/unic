<?php
namespace Unic\Controllers\Trainer;
use Phalcon\Mvc\Controller,
    Phalcon\Mvc\View;

use Unic\Models\CourseCategory;
use Unic\Models\Profiles;
use Unic\Models\Users;
use UploadHandler;
use Phalcon\Http\Response;
use Aws;
use Aws\Common\Enum\Size;
use Aws\Common\Exception\MultipartUploadException;
use Aws\S3\Model\MultipartUpload\UploadBuilder;
use Unic\Models\Videos;
use Unic\Models\Module;
use Unic\Models\Course,
    Unic\Models\CourseSpec;
use Unic\Models\CourseVideos;
use PHPVideoToolkit\Video as VideoTool;

class DashboardController extends TrainerBase {

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

    public function previewMediaAction()
    {

        $file='/Applications/MAMP/htdocs/unic/public/vi.MP4';
        $a=new VideoTool($file);
        $this->view->disable();
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
            // Print the real file names and sizes
            foreach ($this->request->getUploadedFiles() as $file)
            {
                //Move the file into the application
                $file->moveTo('videos/' . $file->getName());
                $media=new Videos();
                $media->filename=$file->getName();
                $media->uploader=$this->auth->getID();

                $media->verified='0';
                $media->save();

                $data[]=(object) array('name'=>$file->getName(),'size'=>$file->getSize(),'url'=>$this->url->get('public/videos/').$file->getName(),'thumbnailUrl'=>$this->url->get('public/videos/').$file->getName(),'deleteUrl'=>$this->url->get('public/videos/').$file->getName(),'deleteType'=>'POST','error'=>$media->getMessages());

            }
            $files=array('files'=>$data);

            $file=(object) $files;

            $response = new Response();
            $response->setContent(json_encode($file));
            return $response;
        }

        if($this->request->isDelete())
        {

        }

    }

// Course Menu

    public function listCourseAction()
    {

    }
    public function createCourseAction()
    {

    }

    public function createCourseDescriptionAction($course_id)
    {
        if(Course::findFirst($course_id)) /* condition whether $course_id is valid or not */
        {
            $IsCourseSpec=CourseSpec::find($course_id)->toArray();
            if($IsCourseSpec)
            {
                $this->view->setVar('CourseSpec',$IsCourseSpec);
            }
            else
            {
                $this->view->setVar('course_id',$course_id);
            }
        }
        else
        {
            $this->view->setVar('error','Duplicate courseId not allowed');
        }


    }

// Media Menu

    public function manageVideosAction($course_id)
    {
        $course=Course::findFirst($course_id);
        if($course && $course_id!='')
        {
            $this->view->setVar('courseID',$course_id);
        }
        else
        {
//            echo 'Sorry, We did not find the course you are looking for';
//            $this->view->disable();
            $this->view->setVar('error','Sorry, We did not find the course you are looking for');
        }

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
        $q=false;
        if($_GET['q'])
        {
            $q=$_GET['q'];
        }
        $question=new ExaminationController();
        $this->view->setVar('question',$question->GetQuestions());

    }

    public function testAction()
    {

        $this->view->disable();

    }


    }
?>
