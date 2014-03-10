<?php




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
            'video_id' => 'video_id', 
            'videoUploader' => 'videoUploader', 
            'videoLength' => 'videoLength', 
            'videoThumb' => 'videoThumb', 
            'videoFilename' => 'videoFilename'
        );
    }

}
