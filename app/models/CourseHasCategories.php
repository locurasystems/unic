<?php

namespace Unic\Models;


class CourseHasCategories extends \Phalcon\Mvc\Model
    {

    /**
     *
     * @var integer
     */
    protected $id;

    /**
     *
     * @var integer
     */
    protected $course_id;

    /**
     *
     * @var integer
     */
    protected $category_id;

    public function getSource()
    {
        return 'course_has_categories';
    }

    /**
     * Method to set the value of field id
     *
     * @param integer $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Method to set the value of field course_id
     *
     * @param integer $course_id
     * @return $this
     */
    public function setCourseId($course_id)
    {
        $this->course_id = $course_id;

        return $this;
    }

    /**
     * Method to set the value of field category_id
     *
     * @param integer $category_id
     * @return $this
     */
    public function setCategoryId($category_id)
    {
        $this->category_id = $category_id;

        return $this;
    }

    /**
     * Returns the value of field id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Returns the value of field course_id
     *
     * @return integer
     */
    public function getCourseId()
    {
        return $this->course_id;
    }

    /**
     * Returns the value of field category_id
     *
     * @return integer
     */
    public function getCategoryId()
    {
        return $this->category_id;
    }

    }
