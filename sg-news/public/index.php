<?php

    require_once '../vendor/autoload.php';

    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\Session\Session;
    
    use Symfony\Component\Routing\Matcher\UrlMatcher;
    use Symfony\Component\Routing\RequestContext;
    use Symfony\Component\Routing\RouteCollection;
    use Symfony\Component\Routing\Route;
    
    use Monolog\Logger;
    use Monolog\Handler\StreamHandler;

    $request = Request::createFromGlobals();
    $session = new Session();
    $session->start();

    $request->setSession($session);
    
    $routes = new RouteCollection();

    $routes->add('get_login_route', new Route('/login/', array('_controller' => function(){

        include_once('../pages/login.php');

    }), array(), array(), '', array(), array('GET')));

    
    $routes->add('post_login_route', new Route('/login/', array('_controller' => function($request){

        include_once('../pages/login_post.php');

    }), array(), array(), '', array(), array('POST')));


    $routes->add('logout_route', new Route('/logout/', array('_controller' => function($request){

        include_once ('../pages/logout.php');

    })));

    $routes->add('get_cabinet_route', new Route('/cabinet/', array('_controller' => function($request){
        
        $session = $request->getSession();

        if ($session->get('qwe') == '123'){
            include ('../pages/cabinet.php');
        } else {
            include ('../pages/cabinet_error_denied.php');
        }

    }), array(), array(), '', array(), array('GET')));

    $routes->add('post_cabinet_route', new Route('/cabinet/', array('_controller' => function($request){
        
        include_once ('../pages/cabinet_post.php');

    }), array(), array(), '', array(), array('POST')));

    $routes->add('index_route', new Route('/', array('_controller' => function(){

        include_once('../pages/index.php');

    })));


    $context = new RequestContext();
    $context->fromRequest($request);
    $matcher = new UrlMatcher($routes, $context);

    $parameters = $matcher->matchRequest($request);

    $action = $parameters['_controller'];

    $action($request);