<?php

namespace Unic\Models;


class Users extends \Phalcon\Mvc\Model
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
    public $userName;
     
    /**
     *
     * @var string
     */
    public $userUsername;
     
    /**
     *
     * @var string
     */
    public $userPassword;
     
    /**
     *
     * @var string
     */
    public $mustChangePassword;
     
    /**
     *
     * @var integer
     */
    public $userProfilesId;
     
    /**
     *
     * @var string
     */
    public $userSecretKey;
     
    /**
     *
     * @var string
     */
    public $userIsActive;
     
    /**
     *
     * @var string
     */
    public $userIsBanned;
     
    /**
     *
     * @var string
     */
    public $userIsSuspended;
     
    /**
     * @return Users[]
     */
    public static function find($parameters = array())
    {
        return parent::find($parameters);
    }

    /**
     * @return Users
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
            'id' => 'id',
            'userName' => 'name',
            'userUsername' => 'username',
            'userPassword' => 'password',
            'mustChangePassword' => 'mustChangePassword', 
            'userProfilesId' => 'userProfilesId',
            'userSecretKey' => 'SecretKey',
            'userIsActive' => 'active',
            'userIsBanned' => 'banned',
            'userIsSuspended' => 'suspended'
        );
    }

    public function initialize()
    {
        $this->belongsTo('userProfilesId', 'Unic\Models\Profiles', 'id', array(
            'alias' => 'profile',
            'reusable' => true
        ));
        $this->hasMany('id', 'Unic\Models\Course', 'creatorID', array(
            'alias' => 'course',
            'reusable' => true
        ));


    }

    public function test()
    {
        return 'aaa';
    }

}
