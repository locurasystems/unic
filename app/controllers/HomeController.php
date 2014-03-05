<?php

namespace Unic\Controllers;

use Phalcon\Mvc\Controller,
    Phalcon\Mvc\View;

class HomeController extends ControllerBase {

    public function indexAction() {
        
    }

    public function loginAction() {
        $this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
    }

    public function registerAction() {
        $this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
    }

}
?>

