<?php

namespace Unic\Controllers;

use Phalcon\Mvc\Controller,
    Phalcon\Mvc\View,
    Unic\Acl\Acl;
use Unic\facebook\Facebook;
use Google;
class HomeController extends ControllerBase {

    public function indexAction()
    {
        $course=new CourseController();
        $course=$course->viewCourse();
        $this->view->setVar('course',$course);
    }

    public function loginAction()
    {
        $this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
    }

    public function registerAction() {
        $this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
    }

    public function NoAccessAction()
    {
        echo 'No Access';
        $this->view->disable();
    }
    public function googleLoginAction()
    {
        $client=new Google\Google_Client();
        $client->setClientId('861200055092-s6203rv7k4pts4qbveg59odprokbt82m.apps.googleusercontent.com');
        $client->setClientSecret('nurGCJIyAmznFAff1GWF0kh4');
        $client->setRedirectUri('https://localhost/unic/home/googleLogin');
        $client->setScopes(array('https://www.googleapis.com/auth/userinfo.profile','https://www.googleapis.com/auth/userinfo.email'));
        $service=new \Google\contrib\Google_Oauth2Service($client);
        if (isset($_GET['logout'])) { // logout: destroy token
            unset($_SESSION['token']);
            die('Logged out.');
        }

        if (isset($_GET['code'])) { // we received the positive auth callback, get the token and store it in session
            $client->authenticate();
            $_SESSION['token'] = $client->getAccessToken();
        }

        if (isset($_SESSION['token'])) { // extract token from session and configure client
            $token = $_SESSION['token'];
            $client->setAccessToken($token);
        }

        if (!$client->getAccessToken()) { // auth call to google
            $authUrl = $client->createAuthUrl();
            header("Location: ".$authUrl);
            die;
        }
//$user=new Google_Oauth2Service($client);
        $token=$_SESSION['token'];
        $Token=json_decode( $token);
        $accessToken = $Token->access_token;
        $userDetails = file_get_contents('https://www.googleapis.com/oauth2/v1/userinfo?access_token=' . $accessToken);
        $userData = json_decode($userDetails);
        echo "<pre>";
        print_r($userData);

$this->view->disable();
        $this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
    }
    public function facebookLoginAction()
    {
        $facebook = new Facebook(array(
            'appId'  => '246139368872293',
            'secret' => 'd94bae5b0e3123045e5bce1cb646f472',
        ));
        if ($facebook->getUser()) {

            try {
                // Proceed knowing you have a logged in user who's authenticated.
                $user_profile = $facebook->api('/me');
                print_r($user_profile);
            } catch (FacebookApiException $e) {
                $user=null;
                $login_url = $facebook->getLoginUrl();
                echo 'Please <a href="' . $login_url . '">login.</a>';
                error_log($e->getType());
                error_log($e->getMessage());

            }
            $logout_url = $facebook->getLogoutUrl();
            echo 'Please <a href="' . $logout_url . '">logout.</a>';

        }
        else
        {
            $login_url = $facebook->getLoginUrl();
            echo 'Please <a href="' . $login_url . '">login.</a>';
            header("Location: ".$login_url);

        }


        $this->view->disable();
        $this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
    }


    public function defAction()
    {
        echo 'This is default';

        echo '\n Printing Session';
        print_r($_SESSION);
        $this->view->disable();
    }

}
?>

