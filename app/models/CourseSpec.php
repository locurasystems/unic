<?php

namespace Unic\Models;

use Phalcon\Mvc\Model;


class CourseSpec extends Model
{

    /**
     *
     * @var integer
     */
    public $cspec_id=0;
     
    /**
     *
     * @var string
     */
    public $courseDescription;
     
    /**
     *
     * @var string
     */
    public $courseAbout;
     
    /**
     *
     * @var integer
     */
    public $courseInstructors;
     
    /**
     *
     * @var string
     */
    public $courseLength;
     
    /**
     *
     * @var string
     */
    public $courseEffort;
     
    /**
     * Independent Column Mapping.
     */
    public function columnMap()
    {
        return array(
            'cspec_id' => 'cspec_id', 
            'courseDescription' => 'courseDescription', 
            'courseAbout' => 'courseAbout', 
            'courseInstructors' => 'courseInstructors', 
            'courseLength' => 'courseLength', 
            'courseEffort' => 'courseEffort'
        );
    }
    public function getCourseDetail()
    {
        return CourseSpec::findFirst();
    }

}
