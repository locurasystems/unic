<?php
namespace Unic\Controllers;
use Phalcon\Mvc\Controller,
    Phalcon\Mvc\View;

use UploadHandler;
use Phalcon\Http\Response;
use Aws;
use Aws\Common\Enum\Size;
use Aws\Common\Exception\MultipartUploadException;
use Aws\S3\Model\MultipartUpload\UploadBuilder;

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
	public function addMediaAction()
	{
		 
	}

	public function uploadMediaAction()
	{
        $bucket="unic-videos";
        $client = Aws\S3\S3Client::factory(array(
            'key' => 'AKIAIKTCZRJH4A4OKGQQ',
            'secret' => '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'
        ));
        foreach ($this->request->getUploadedFiles() as $file)
        {
            $data[]=(object) array('name'=>$file->getName(),'size'=>$file->getSize(),'url'=>$this->url->get('public/videos/').$file->getName(),'thumbnailUrl'=>$this->url->get('public/videos/').$file->getName(),'deleteUrl'=>$this->url->get('public/videos/').$file->getName(),'deleteType'=>'DELETE');
            //Move the file into the application
            $result = $client->putObject(array(
                'Bucket' => $bucket,
                'Key' => $file->getName(),
                'SourceFile' => $file->getTempName(),
                'Metadata' => array(
                    'Foo' => 'abc',
                    'Baz' => '123'
                )
            ));
        }

        $files=array('files'=>$data);

        $file=(object) $files;
        $response = new Response();
        $response->setContent(json_encode($file));
        return $response;
		 
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

    public function testAction()
    {
        $client = Aws\S3\S3Client::factory(array(
            'key' => 'AKIAIKTCZRJH4A4OKGQQ',
            'secret' => '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'
        ));

        $bucket = "unic-videosddd";
        echo "Creating bucket named {$bucket}\n";
        $result = $client->createBucket(array(
            'Bucket' => $bucket
        ));

// Wait until the bucket is created
        $client->waitUntilBucketExists(array('Bucket' => $bucket));

        /*
Files in Amazon S3 are called "objects" and are stored in buckets. A specific
object is referred to by its key (i.e., name) and holds data. Here, we create
a new object with the key "hello_world.txt" and content "Hello World!".

For a detailed list of putObject's parameters, see:
http://docs.aws.amazon.com/aws-sdk-php-2/latest/class-Aws.S3.S3Client.html#_putObject
*/
        $key = 'hello_world.txt';
        echo "Creating a new object with key {$key}\n";
        $result = $client->putObject(array(
            'Bucket' => $bucket,
            'Key' => $key,
            'Body' => "Hello World!"
        ));

        /*
Download the object and read the body directly.

For more examples of downloading objects, see the developer guide:
http://docs.aws.amazon.com/aws-sdk-php-2/guide/latest/service-s3.html#downloading-objects

Or the API documentation:
http://docs.aws.amazon.com/aws-sdk-php-2/latest/class-Aws.S3.S3Client.html#_getObject
*/
        echo "Downloading that same object:\n";
        $result = $client->getObject(array(
            'Bucket' => $bucket,
            'Key' => $key
        ));

        echo "\n---BEGIN---\n";
        echo $result['Body'];
        echo "\n---END---\n\n";
        $this->view->disable();

    }


}
?>



