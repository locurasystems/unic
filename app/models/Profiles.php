<?php
namespace Unic\Models;

use Phalcon\Mvc\Model;

/**
 * Unic\Models\Profiles
 * All the profile levels in the application. Used in conjenction with ACL lists
 */
class Profiles extends Model
{

    /**
     * ID
     * @var integer
     */
    public $id;

    /**
     * Name
     * @var string
     */
    public $profileName;

    /**
     * Active
     * @var bool
     */
    public $profileIsActive;

    /**
     * Define relationships to Users and Permissions
     */
    public function initialize()
    {
        $this->hasMany('id', 'Unic\Models\Users', 'profilesId', array(
            'alias' => 'users',
            'foreignKey' => array(
                'message' => 'Profile cannot be deleted because it\'s used on Users'
            )
        ));

        $this->hasMany('id', 'Unic\Models\Permissions', 'profilesId', array(
            'alias' => 'permissions'
        ));
    }

    public function columnMap()
    {
        return array(
            'id' => 'id',
            'profileName' => 'name',
            'profileIsActive' => 'active'
        );
    }
}