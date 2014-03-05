<?php

$router = new \Phalcon\Mvc\Router;

$router->addGet("/register", "home::register")->setName("register");

$router->addGet("/register", array('controller' => 'home','action' => 'register'))->setName("register");

$router->addPost("/doRegister", array('controller' => 'user','action' => 'register'))->setName("doRegister");

$router->addPost("/doLogin", array('controller' => 'user','action' => 'login'))->setName("doLogin");

$router->addPost("/dashboard/createCourse",array('controller' =>'course','action'=>'createcourse'))->setName('createCourse');

$router->addPost("/examination/AddTest",array('controller' =>'examination','action'=>'AddTest'))->setName('AddTest');

$router->addPost("/examination/AddQuestions",array('controller' =>'examination','action'=>'AddQuestions'))->setName('AddQuestions');

$router->addPost("/examination/AddModule",array('controller' =>'examination','action'=>'AddModule'))->setName('AddModule');




$router->add('/admin/:controller', array(
    'namespace' => 'Unic\Controllers\Admin',
    'controller' => 1
));

$router->add('/admin/:controller/:action/:params', array(
	'namespace' => 'Unic\Controllers\Admin',
	'controller' => 1,
    'action'=>2,
    'params'=>3
));




/*
 *Default Routes
*/
return $router;
