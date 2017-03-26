<?php
    namespace App\Controller;

    use \Psr\Http\Message\ServerRequestInterface as Request;
    use \Psr\Http\Message\ResponseInterface as Response;

    use App\Model\NewsMapper;
    use App\Model\NewsEntity;

    class Front
    {
        public static function getIndex(Request $request, Response $response)
        {
            
            $mapper = new NewsMapper($_REQUEST['db']);
            $news = $mapper->getNews();
            
            foreach ($news as $someNews){
                echo $someNews['title'];
            }
                 
        }

        public static function getLogin(Request $request, Response $response)
        {
            include_once ('../src/View/login.php');
        }

        public static function postLogin(Request $request, Response $response)
        {
            $req = $request->getBody();
            //echo $req; Выведет строку name=fddf&password=sdsad;
            list($first, $second) = explode("&",$req);
            list( ,$name) = explode("=",$first);
            list( ,$password) = explode("=",$second);

            if($name == "test" && $password = "123"){
                session_start();
                header('Location:/cabinet');
            } else {
                header('Location:/login');
            }
        }

        public static function getLogout(Request $request, Response $response)
        {
            unset($_SESSION['test']);
            session_destroy();
            header('Location:/');
        }
    }