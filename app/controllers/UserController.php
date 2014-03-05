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
        if ($this->security->checkToken()) {

            $password = $this->security->hash($this->request->getPost('password'));

            // Inserting user data 
            $user = new Users();
            $user->username = $this->request->getPost('username');
            $user->password = $password;
            $user->active='N';
            $user->suspended='N';
            $user->banned='N';
            $user->save();
            
            $dispatcher->forward(array(
                    'controller' => 'index',
                    'action' => 'index'
                )
                    );
                return false;
        }
    }

    public function loginAction() {

        if ($this->security->checkToken()) {
            $data = array('username' => $this->request->getPost('username'), 'password' => $this->request->getPost('password'));

            $this->auth->check($data);
        }
    }

}

// END class 	
?>