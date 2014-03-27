<?php
/**
 * Created by PhpStorm.
 * User: bhoo
 * Date: 2/12/14
 * Time: 1:23 PM
 */

namespace Unic\Controllers\Admin;
use Phalcon\Mvc\Controller,
    Phalcon\Mvc\View,
    Unic\Models\CourseSpec;
use Unic\Database\Tree;
use Unic\Models\Course;
use Unic\Models\CourseCategory;
use Database;
use Unic\Models\CourseHasCategories;

class CourseController extends ControllerBase
    {
    public function listCategoryAction ()
    {
        if ($this->request->isPost ()) {
            $action = $this->request->getJsonRawBody ();
            $action = $action->action;

            switch ( $action ) {
                case 'all':
                    $res = CourseCategory::find ()->toArray ();
                    echo json_encode ($res);
                    break;
            }


        }
        $this->view->disable ();
    }

    public function CategoryAction ()
    {
        if ($this->request->isPost ()) {
            $param  = $this->request->getJsonRawBody ();
            $action = $param->action;
            $tree   = new Tree();
            $tree->Tree ('course_categories', 'id', 'name', 'lft', 'rgt', 'parent');

            switch ( $action ) {
                case 'add':
                    $id   = $param->pid;
                    $name = $param->name;

                    $tree->add ($id, $name);
                    break;

                case 'delete':
                    $id = $param->id;
                    $tree->delete ($id);
                    break;

                case 'leaf':
                    echo json_encode ($tree->get_leaf_nodes ());
                    $this->view->disable ();
                    break;


            }
        }
        $this->view->disable ();
    }

    public function createAction ()
    {
        if($this->request->isPost())
        {
            $param = $this->request->getJsonRawBody ();

            /*Transaction Start*/

            $this->db->begin ();
            $course            = new Course();
            $course->code      = $param->code;
            $course->name      = $param->name;
            $course->price     = $param->price;
            $course->creatorID = '1';
            if ($course->save () == false) {
                $this->db->rollback ();
                return;
            }

            $category              = new CourseHasCategories();
            $category->category_id = $param->category;
            $category->course_id   = $course->id;
            if ($category->save () == false)
            {
                $this->db->rollback ();
            }

            if($course->save()==true && $category->save()==true)
            {
                echo $course->id;
            }

            /*Transaction Commit*/
            $this->db->commit ();
        }
        $this->view->disable ();
    }

    public function listAction()
    {
        if($this->request->isPost())
        {
            //$param=$this->request->getJsonRawBody();
            $course=Course::find()->toArray();
            if($course)
            {
                echo json_encode($course);
            }
            else
            {
                echo 'no data found';
            }

        }

        $this->view->disable();
    }
    public function createCourseDescriptionAction()
    {
        //TODO instructor ID have to pass
        if($this->request->isPost())
        {
            $param=$this->request->getJsonRawBody();
            /* Transaction starts here */
            $this->db->begin();
            $courseSpec= new CourseSpec();
            $courseSpec->specID         =   $param->courseID;
            $courseSpec->description    =   $param->description;
            $courseSpec->about          =   $param->about;
            $courseSpec->instructors    =   5;
            $courseSpec->length         =   $param->length;
            $courseSpec->effort         =   $param->estimated_effort;
            if ($courseSpec->save () == false)
            {
                $this->db->rollback ();
                return;
            }
            /* Transaction Commit */
            $this->db->commit();

        }
        $this->view->disable();
    }
    public function updateCourseDescriptionAction()
    {
        //TODO instructor id is duplicate
        if($this->request->isPost())
        {
            $param=$this->request->getJsonRawBody();
            /*Transaction Starts here*/
                $this->db->begin();
                $courseSpec     = CourseSpec::findFirst($param->courseID);
                $courseSpec->description    =   $param->description;;
                $courseSpec->about          =   $param->about;
                $courseSpec->instructors    =   5;
                $courseSpec->length         =   $param->length;
                $courseSpec->effort         =   $param->effort;
                if($courseSpec->update() == false )
                {
                    $this->db->rollback ();
                    return;
                }
                /* Transaction commit*/
                $this->db->commit();
        }
        $this->view->disable();
    }

  }