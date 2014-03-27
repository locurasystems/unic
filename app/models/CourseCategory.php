<?php

namespace Unic\Models;


class CourseCategory extends \Phalcon\Mvc\Model
    {

    /**
     *
     * @var integer
     */
    public $id;

    /**
     *
     * @var string
     */
    public $name;

    /**
     *
     * @var integer
     */
    public $lft;

    /**
     *
     * @var integer
     */
    public $rgt;

    /**
     *
     * @var integer
     */
    public $parent;

    public function getSource()
    {
        return 'course_categories';
    }

 }
