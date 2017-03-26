<?php

    namespace App\Controller;

    use \Psr\Http\Message\ServerRequestInterface as Request;
    use \Psr\Http\Message\ResponseInterface as Response;

    use App\Model\SourceMapper;
    use App\Model\SourceEntity;

    class Cabinet
    {
        public static function _before(Request $request, Response $response)
        {
            if (isset($_SESSION['test'])){
                echo 'Вы залогинены';
            }
        }

        public static function getIndex(Request $request, Response $response)
        {
            echo '<a href="/logout">Выйти</a>';
            include_once '../src/View/cabinet.php';

            $mapper = new SourceMapper($_REQUEST['db']);
            $feeds = $mapper->getSources();
            
            foreach ($feeds as $someFeed){
                echo $someFeed['link'];
            }
        }

        public static function postAddSource(Request $request, Response $response){
            
            $req = $request->getBody();
            //echo $req; Выведет строку name=fddf&password=sdsad;
            list($first, $second) = explode("&",$req);
            list( ,$name) = explode("=",$first);
            list( ,$link) = explode("=",$second);

            $data = ["name" => $name, "sourceLink" => $link];
            $source = new SourceEntity($data);

            $mapper = new SourceMapper($_REQUEST['db']);
            $mapper->save($source);

            //header('Location:/cabinet');
        }

    
}