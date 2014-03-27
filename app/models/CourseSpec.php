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
            'cspec_id' => 'specID',
            'courseDescription' => 'description',
            'courseAbout' => 'about',
            'courseInstructors' => 'instructors',
            'courseLength' => 'length',
            'courseEffort' => 'effort'
        );
    }

    public function initialize()
    {
        $this->belongsTo("specID",'Unic\Models\Course','id');
    }
    public function getCourseDetail()
    {
        return CourseSpec::findFirst();
    }

}
