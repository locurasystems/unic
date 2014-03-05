<?php




class Users extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $u_id;
     
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
            'u_id' => 'u_id', 
            'userName' => 'userName', 
            'userUsername' => 'userUsername', 
            'userPassword' => 'userPassword', 
            'mustChangePassword' => 'mustChangePassword', 
            'userProfilesId' => 'userProfilesId', 
            'userSecretKey' => 'userSecretKey', 
            'userIsActive' => 'userIsActive', 
            'userIsBanned' => 'userIsBanned', 
            'userIsSuspended' => 'userIsSuspended'
        );
    }

}
