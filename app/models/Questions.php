<?php
namespace Unic\Models;

use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Message,
    Phalcon\Mvc\Model\Query;
 use   Unic\Models\Module as module;

use Phalcon\Mvc\Model\Resultset\Simple as Resultset;


class Questions extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $question_id;
     
    /**
     *
     * @var integer
     */
    public $questionModuleID;
     
    /**
     *
     * @var string
     */
    public $questionText;
     
    /**
     *
     * @var string
     */
    public $questionOptions;
     
    /**
     *
     * @var string
     */
    public $questionMarks;
     
    /**
     * Independent Column Mapping.
     */
    public function columnMap()
    {
        return array(
            'question_id' => 'question_id', 
            'questionModuleID' => 'questionModuleID', 
            'questionText' => 'questionText', 
            'questionOptions' => 'questionOptions', 
            'questionMarks' => 'questionMarks'
        );
    }
    public function initialize()
    {
        $this->hasMany("questionModuleID","Module","module_id");
    }
    public static function getQuestions()
    {


        $sql="SELECT * FROM questions q
                JOIN module m
                ON q.questionModuleID = m.module_id
                WHERE q.questionModuleID IN (1,2,3)";
        $question=new Questions();
        $data= new Resultset(null,$question,$question->getReadConnection()->query($sql));
        if(isset($_GET["page"]))
        {
            $currentPage=(int)$_GET["page"];
            if($currentPage=='')
            {
                $currentPage = 1;
            }
        }
        else
        {
            $currentPage=1;
        }
        $paginator = new \Phalcon\Paginator\Adapter\Model(
            array(
                "data"  => $data,
                "limit" => 15,
                "page"  => $currentPage
            ));
        $page=$paginator->getPaginate();
        return $page;
    }

    public static  function getQuestionLimit($moduleID,$start,$perPage)
    {

    }

}
