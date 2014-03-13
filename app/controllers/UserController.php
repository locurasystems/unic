<?php

namespace Unic\Controllers;

use Phalcon\Mvc\View;
use Unic\Models\Users;
use Unic\Functions;
use Unic\Auth\Auth;
use Phalcon\Mvc\Dispatcher;

/**
 * UserController class
 *
 * @package default
 * @author Ashes Vats
 * */
class UserController extends ControllerBase {

    public function registerAction() {

        // Check CSRF security token
        if ($this->security->checkToken())
        {

            $password = $this->security->hash($this->request->getPost('password','string'));

            // Inserting user data 
            $user = new Users();
            $user->name=$this->request->getPost('first_name','string').' '. $this->request->getPost('last_name','string');
            $user->username = $this->request->getPost('username','string');
            $user->password = $password;
            $user->profilesId=$this->request->getPost('module');
            $user->active='N';
            $user->suspended='N';
            $user->banned='N';
            $user->save();
            print_r($user->getMessages());
        }
    }

    public function loginAction()
    {
            if ($this->security->checkToken())
            {
                $data = array('username' => $this->request->getPost('username'), 'password' => $this->request->getPost('password'));
                $this->auth->check($data);
                return $this->response->redirect('dashboard');

            }

    }

    public function profileAction()
    {

    }

}

// END class 	
?>