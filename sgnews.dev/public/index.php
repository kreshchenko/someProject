<?php
    require_once '../vendor/autoload.php';

    use \Psr\Http\Message\ServerRequestInterface as Request;
    use \Psr\Http\Message\ResponseInterface as Response;

    $config['displayErrorDetails'] = true;
    $config['addContentLengthHeader'] = false;

    $config['db']['host'] = 'localhost';
    $config['db']['user'] = 'dbuser';
    $config['db']['pass'] = '123';
    $config['db']['dbname'] = 'sg_news';

    $app = new \Slim\App(["settings" => $config]);
    
    $container = $app->getContainer();

    $container['db'] = function($c){
        $db = $c['settings']['db'];
        $pdo = new PDO("mysql:host=" . $db['host'] . ";dbname=" . $db['dbname'] . ";", $db['user'], $db['pass']);
        return $pdo;
    };
    $_REQUEST['db'] = $container['db'];

    $app->get('/', "App\Controller\Front::getIndex");
    $app->get('/login', "App\Controller\Front::getLogin");
    $app->post('/login', 'App\Controller\Front::postLogin');
    $app->get('/logout', 'App\Controller\Front::getLogout');
    $app->get('/cabinet', 'App\Controller\Cabinet::getIndex');
    $app->post('/cabinet', 'App\Controller\Cabinet::postAddSource');
    

    $app->run();