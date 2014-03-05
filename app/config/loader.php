<?php

$loader = new \Phalcon\Loader();
/**
 * We're a registering a set of directories taken from the configuration file
 */
// $loader->registerDirs(
//     array(
//         $config->application->controllersDir,
//         $config->application->modelsDir,
// 		$config->application->libraryDir
//     )
// );
		
$loader->registerNamespaces(array(
    'Unic\Models' => $config->application->modelsDir,
    'Unic\Controllers' => $config->application->controllersDir,
    'Unic' => $config->application->libraryDir,

));

$loader->register();
