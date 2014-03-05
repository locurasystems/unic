<?php


namespace Unic\Models;

use Phalcon\Mvc\Model;



class Module extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $module_id;
     
    /**
     *
     * @var string
     */
    public $moduleName;
     
    /**
     *
     * @var integer
     */
    public $moduleType;
     
    /**
     * Independent Column Mapping.
     */
    public function columnMap()
    {
        return array(
            'module_id' => 'module_id', 
            'moduleName' => 'moduleName', 
            'moduleType' => 'moduleType'
        );
    }

    public  function initialize()
    {
        $this->hasMany("module_id","Questions","questionModuleID");
    }

    /**
     * prints all modules
     *
     * @return mixed
     */
    public static function getModules()
    {
        $module=Module::find(array("module_id","moduleName","moduleType"));
        
        return $module;
    }


}
