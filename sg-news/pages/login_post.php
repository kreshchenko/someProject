<?php

    require_once '../vendor/autoload.php';
    use Monolog\Logger;
    use Monolog\Handler\StreamHandler;
    
    $log = new Logger('sg_news');
    $log->pushHandler(new StreamHandler('../logs/sg_news.log', Logger::DEBUG));

    $post = $request->request->all();
    $session = $request->getSession();

    if (isset($post['name']) && isset($post['password'])){
        $login = $post['name'];
        $password = $post['password'];

        if ($login == 'qwe' && $password == '123'){
            $session->set('qwe','123');
            $log->info('В кабинет зашел Юзер:'.$login);
            header('Location:/cabinet/');
        } else {
            $log->info('В кабинет пытася зайти незарегестрированый юзер');
            header('Location:/login/');
        }
    }