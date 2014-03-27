<?php
namespace Unic\Trainer;

use Phalcon\Http\Response;
use Phalcon\Http\Request;
use Unic\Models\Course;
use Unic\Models\CourseHasCategories;
Use Unic\Database\Tree;
use     Unic\Models\CourseSpec;

class CourseFunction
    {

    private $request;

        public function saveStep1()
        {
            $request=new Request();

            if($request->isPost())
            {
                $param = $request->getJsonRawBody ();


                $course            = new Course();
                $course->code      = $param->code;
                $course->name      = $param->name;
                $course->price     = $param->price;
                $course->creatorID = '1';
                if($course->save()==true)
                {
                    $category              = new CourseHasCategories();
                    $category->category_id = $param->category;
                    $category->course_id   = $course->id;
                    if($category->save()==true)
                    {
                        return $course->id;
                    }
                }

                else
                {
                    return false;
                }

            }
        }

     public function saveStep2()
     {
         $request=new Request();
         //TODO instructor ID have to pass
         if($request->isPost())
         {
             $param=$request->getJsonRawBody();

             $courseSpec= new CourseSpec();
             $courseSpec->specID         =   $param->courseID;
             $courseSpec->description    =   $param->description;
             $courseSpec->about          =   $param->about;
             $courseSpec->instructors    =   5;
             $courseSpec->length         =   $param->length;
             $courseSpec->effort         =   $param->estimated_effort;
             if ($courseSpec->save () == true)
             {
                return true;
             }

             return false;

         }

         return false;
     }

    }
?>