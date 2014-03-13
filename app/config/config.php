<?php

return new \Phalcon\Config(array(
    'database' => array(
<<<<<<< HEAD
        'adapter'     => 'Mysql',
        'host'        => 'localhost',
        'username'    => 'root',
        'password'    => '',
        'dbname'      => 'unic',
=======
        'adapter' => 'Mysql',
        'host' => 'localhost',
        'username' => 'root',
        'password' => 'zodiac',
        'dbname' => 'unic',
>>>>>>> 484682b487b1bc396cfba5f631cfdd97539e179c
    ),
    'application' => array(
        'controllersDir' => __DIR__ . '/../../app/controllers/',
        'modelsDir' => __DIR__ . '/../../app/models/',
        'viewsDir' => __DIR__ . '/../../app/views/',
        'adminDir' => __DIR__ . '/../../app/views/admin/',
        'pluginsDir' => __DIR__ . '/../../app/plugins/',
        'libraryDir' => __DIR__ . '/../../app/library/',
        'cacheDir' => __DIR__ . '/../../app/cache/',
        'logDir' => __DIR__ . '/../../app/logs/',
        'baseUri' => '/unic/',
        'cryptSalt' => 'eEAfR|_&G&f,+vU]:jFr!!A&+71w1Ms9~8_4L!<@[N@DyaIP_2My|:+.u>/6m,$D'
    ),
    'mail' => array(
        'fromName' => 'Unic',
        'fromEmail' => 'info@unic.com',
        'smtp' => array(
            'server' => 'smtp.gmail.com',
            'port' => 587,
            'security' => 'tls',
            'username' => '',
            'password' => ''
        )
    ),
    'amazon' => array(
        'AccessKeyId' => 'AKIAIKTCZRJH4A4OKGQQ',
        'SecretKey' => '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'
    )

));

// 
// 'error' => [
//     'logger' => new \Phalcon\Logger\Adapter\File(__DIR__ . '/../../public/log/dev/a.log'),
//     'controller' => 'error',
//     'action' => 'index',
// ]
