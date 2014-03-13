<?php

namespace Unic\Models;
use Phalcon\Mvc\Model;


class TestHasModule extends \Phalcon\Mvc\Model
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
    public $test_has_module_id;
     
    /**
     *
     * @var integer
     */
    public $module_id;
     
    /**
     * @return TestHasModule[]
     */
    public static function find($parameters = array())
    {
        return parent::find($parameters);
    }

    /**
     * @return TestHasModule
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
            'module_id' => 'module_id',
            'test_has_module_id' =>'test_has_module_id'
        );
    }

}
