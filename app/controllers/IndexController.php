<?php
namespace Unic\Controllers;
use Phalcon\Mvc\Controller,
    Phalcon\Mvc\View;
class IndexController extends ControllerBase {

    public function indexAction() {
        
       
        
    }

    public function infoAction() {
        //Disable the view to avoid rendering
        $this->view->disable();
    }

    public function route404Action() {
        echo 'Pgae not Found';
    }

}
?>



