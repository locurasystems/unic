<?php
namespace Unic\Models;
use Phalcon\Mvc\Model as DB;
class Course extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $c_id;
    /**
     *
     * @var string
     */
    public $courseName;
    /**
     *
     * @var integer
     */
    public $courseCreatorId;
    /**
     *
     * @var string
     */
    public $courseCode;
    /**
     *
     * @var integer
     */
    public $coursePage;
    /**
     *
     * @var integer
     */
    public $coursePrice;
    /**
     *
     * @var integer
     */
    public $courseIsActive;
    /**
     *
     * @var string
     */
    public $courseCreatedAt;
    /**
     *
     * @var string
     */
    public $courseStartAt;

    private static $percentageColumn = array(
        'code'        => '5',
        'page'        => '5',
        'price'       => '5',
        'startAt'     => '5',
        'description' => '5',
        'about'       => '5',
        'instructors' => '5',
        'length'      => '5',
        'effort'      => '5'
    );

    /**
     * @return Course[]
     */
    public static function find($parameters = array())
    {
        return parent::find($parameters);
    }

    /**
     * @return Course
     */
    public static function findFirst($parameters = array())
    {
        return parent::findFirst($parameters);
    }

    public function getId()
    {
        return $this->c_id;
    }

    /**
     * Map existing database column name with given name
     *
     * @return array
     */
    public function columnMap()
    {
        return array(
            'c_id' => 'id',
            'courseName' => 'name',
            'courseCreatorId' => 'creatorID',
            'courseCode' => 'code',
            'coursePage' => 'page',
            'coursePrice' => 'price',
            'courseIsActive' => 'active',
            'courseCreatedAt' => 'createdAt',
            'courseStartAt' => 'startAt'
        );
    }

    public function initialize()
    {
        $this->hasMany("id",'Unic\Models\CourseVideos', "courseID");

        $this->hasOne('id', 'Unic\Models\CourseSpec', 'specID',array(
            'alias'=>'Spec',
            'reusable'=>true
        ));
    }

    public static function percentageComplete($course_id)
    {
        $percentage=0;
        $course=Course::findFirst($course_id);
        $spec=$course->Spec;
        $spec=$spec->toArray();
        $course=$course->toArray();
        foreach(self::$percentageColumn as $key=>$value)
        {
            if(isset($spec[$key]))
            {
                $percentage = self::$percentageColumn[$key] +$percentage;
            };
        }

        foreach(self::$percentageColumn as $key=>$value)
        {
            if(isset($course[$key]))
            {
                $percentage = self::$percentageColumn[$key] +$percentage;
            };
        }

        return $percentage;
    }


}