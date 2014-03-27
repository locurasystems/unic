<?php


namespace Unic\Models;

class CourseVideos extends \Phalcon\Mvc\Model
    {

    /**
     *
     * @var integer
     */
    protected $course_id;

    /**
     *
     * @var integer
     */
    protected $video_id;

    /**
     *
     * @var integer
     */
    protected $id;

    /**
     * Method to set the table name
     *
     * @return course_has_videos
     */
    public function getSource ()
    {
        return 'course_has_videos';
    }

    /**
     * Method to set the value of field course_id
     *
     * @param integer $course_id
     *
     * @return $this
     */
    public function setCourseId ($course_id)
    {
        $this->course_id = $course_id;

        return $this;
    }

    /**
     * Method to set the value of field video_id
     *
     * @param integer $video_id
     *
     * @return $this
     */
    public function setVideoId ($video_id)
    {
        $this->video_id = $video_id;

        return $this;
    }

    /**
     * Method to set the value of field id
     *
     * @param integer $id
     *
     * @return $this
     */
    public function setId ($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Returns the value of field course_id
     *
     * @return integer
     */
    public function getCourseId ()
    {
        return $this->course_id;
    }

    /**
     * Returns the value of field video_id
     *
     * @return integer
     */
    public function getVideoId ()
    {
        return $this->video_id;
    }

    /**
     * Returns the value of field id
     *
     * @return integer
     */
    public function getId ()
    {
        return $this->id;
    }

    /**
     * Map existing database column name with given name
     *
     * @return array
     */
    public function columnMap ()
    {
        return array(
            'id'        => 'id',
            'course_id' => 'courseID',
            'video_id'  => 'videoID',
            'order'     => 'order'
        );
    }

//    public function initialize ()
//    {
//        $this->belongsTo ("course_id", 'Unic\Models\Course', "id");
//        $this->belongsTo ("video_id", 'Unic\Models\Videos', "id");
////        $this->hasMany("videoID",'Unic\Models\Videos', "id", array(
////            'alias' => 'Video',
////            'reusable' => true
////        ));
//    }
}
