<?php

namespace Unic\Models;

use Phalcon\Mvc\Model;


class Test extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $test_id;
     
    /**
     *
     * @var integer
     */
    public $testCreaterID;
     
    /**
     *
     * @var string
     */
    public $testName;
     
    /**
     *
     * @var string
     */
    public $testStartDate;
     
    /**
     *
     * @var string
     */
    public $testCreatedAt;
     
    /**
     *
     * @var string
     */
    public $testIsActive;
     
    /**
     * @return Test[]
     */
    public static function find($parameters = array())
    {
        return parent::find($parameters);
    }

    /**
     * @return Test
     */
    public static function findFirst($parameters = array())
    {
        return parent::findFirst($parameters);
    }

    /**
     * Independent Column Mapping.
     */
    public function columnMap()
    {
        return array(
            'test_id' => 'test_id', 
            'testCreaterID' => 'testCreaterID', 
            'testName' => 'testName', 
            'testStartDate' => 'testStartDate', 
            'testCreatedAt' => 'testCreatedAt', 
            'testIsActive' => 'testIsActive'
        );
    }

}
