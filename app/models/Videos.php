<?php

namespace Unic\Models;
use Phalcon\Mvc\Model\Behavior\Timestampable;

class Videos extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $video_id;
     
    /**
     *
     * @var integer
     */
    public $videoUploader;
     
    /**
     *
     * @var string
     */
    public $videoLength;
     
    /**
     *
     * @var string
     */
    public $videoThumb;
     
    /**
     *
     * @var string
     */
    public $videoFilename;

    /**
     *
     * @var integer
     */
    public $videoIsVerified;

    /**
     *
     * @var date
     */
    public $videoUploadedAt;

    /**
     * @return Videos[]
     */
    public static function find($parameters = array())
    {
        return parent::find($parameters);
    }

    /**
     * Find the first matched row from videos table
     *
     * @param array $parameter
     * @return array videos
     */
    public static function findFirst($parameters = array())
    {
        return parent::findFirst($parameters);
    }

    /**
     * Map existing database column name with given name
     *
     * @return array
     */
    public function columnMap()
    {
        return array(
            'video_id'            => 'id',
            'videoUploader'       => 'uploader',
            'videoLength'         => 'length',
            'videoThumb'          => 'thumb',
            'videoFilename'       => 'filename',
            'videoIsVerified'     =>'verified',
            'videoUploadedAt'     =>'uploadedAt'
        );
    }

    public function initialize()
    {
        $this->hasMany("id",'Unic\Models\CourseVideos', "videoID");

        $this->addBehavior(new Timestampable(
            array(
                'beforeCreate' => array(
                    'field' => 'uploadedAt',
                    'format' => 'Y-m-d'
                )
            )
        ));
    }

    public function notSave()
    {
        //Obtain the flash service from the DI container
        $flash = $this->getDI()->getFlash();

        //Show validation messages
        foreach ($this->getMessages() as $message) {
            $flash->error($message);
        }
    }

}
