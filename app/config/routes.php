<?php

$router = new \Phalcon\Mvc\Router;

$router->addGet("/login", "home::login")->setName("login");

$router->addGet("/register", array('controller' => 'home','action' => 'register'))->setName("register");

$router->addPost("/doRegister", array('controller' => 'user','action' => 'register'))->setName("doRegister");

$router->addPost("/doLogin", array('controller' => 'user','action' => 'login'))->setName("doLogin");

$router->addPost("/dashboard/createCourse",array('controller' =>'course','action'=>'createcourse'))->setName('createCourse');

$router->addPost("/examination/AddTest",array('controller' =>'examination','action'=>'AddTest'))->setName('AddTest');

$router->addPost("/examination/AddQuestions",array('controller' =>'examination','action'=>'AddQuestions'))->setName('AddQuestions');

$router->addPost("/examination/AddModule",array('controller' =>'examination','action'=>'AddModule'))->setName('AddModule');

$router->addPost("/examination/AddQuestion/getModuleID",array('controller'=>'examination','action'=>'GetModuleByTestID'))->setName('GetModuleByTestID');

$router->addGet("/dashboard/Exam/TryTest",array('controller'=>'examination','action'=>'TryTest'))->setName('TryTest');

$router->addGet("/dashboard/Exam/TryTest/SelectTest",array('controller'=>'examination','action'=>'SelectTest'))->setName('SelectTest');

$router->addPost("/dashboard/Exam/TryTest/QuestionSet",array('controller'=>'examination','action'=>'LoadQuestionSet'))->setName('QuestionSet');

$router->addPost("/dashboard/Exam/TryTest/Next",array('controller'=>'examination','action'=>'TryTest'))->setName('TryTestNext');




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
