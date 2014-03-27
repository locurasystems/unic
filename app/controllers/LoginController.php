<?php
/**
 * Created by PhpStorm.
 * User: bhoo
 * Date: 3/22/14
 * Time: 11:06 AM
 */
namespace Unic\Controllers;

require_once 'google_api/src/Google_Client.php';
require_once 'google_api/src/contrib/Google_Oauth2Service.php';
require_once 'google_api/src/GetCredentialsException.php';

class LoginController extends ControllerBase
{
    public function logAction()
    {
        $a=new Google_Oauth2Service();
        $this->view->disable();
    }
}