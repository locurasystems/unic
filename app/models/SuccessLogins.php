<?php
namespace Unic\Models;


/**
* SuccessLogins
* This model registers successfull logins registered users have made
*/
class SuccessLogins extends \Phalcon\Mvc\Model
{

    /**
*
* @var integer
*/
    public $id;

    /**
*
* @var integer
*/
    public $usersId;

    /**
*
* @var string
*/
    public $ipAddress;

    /**
*
* @var string
*/
    public $userAgent;

     public function initialize()
     {
         $this->belongsTo('usersId', 'Unic\Models\Users', 'id', array(
             'alias' => 'user'
         ));
     }
}