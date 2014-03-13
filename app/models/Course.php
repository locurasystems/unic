<?php
namespace Unic\Models;

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
    public $courseSchoolId;

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
     * Independent Column Mapping.
     */
    public function columnMap()
    {
        return array(
            'c_id' => 'c_id',
            'courseName' => 'name',
            'courseSchoolId' => 'schoolId',
            'courseCode' => 'code',
            'coursePage' => 'page',
            'coursePrice' => 'price',
            'courseIsActive' => 'active',
            'courseCreatedAt' => 'createdAt',
            'courseStartAt' => 'startAt'
        );
    }

}