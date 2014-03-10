<?php

namespace Unic\Models;


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
     * @return Videos
     */
    public static function findFirst($parameters = array())
    {
        return parent::findFirst($parameters);
    }

    /**
     * Independent Column Mapping.
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

}
