<?php

namespace Unic\Controllers;

use Phalcon\Mvc\Controller,
    Phalcon\Mvc\View,
    Unic\Acl\Acl;

class HomeController extends ControllerBase {

    public function indexAction() {

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

    public function defAction()
    {
        echo 'This is default';

        echo '\n Printing Session';
        print_r($_SESSION);
        $this->view->disable();
    }

}
?>

