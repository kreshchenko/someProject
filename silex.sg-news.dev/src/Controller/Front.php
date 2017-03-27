<?php

namespace App\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;

use App\Model\NewsMapper;
use App\Model\NewsEntity;

class Front
{
    public function getIndex(Request $request, Application $app)
    {
        $mapper = new NewsMapper($app['db']);
        $items = $mapper->getNews();

        $logged = $request->getSession()->get('logged');

        $app['view.name'] = 'index';
        return $app['view']->data(['items' => $items, 'logged' => $logged])->render();
        // return include '../templates/index.tpl.php';
    }
    
    public function getLogin(Request $request, Application $app)
    {
        $app['view.name'] = 'login';
        return $app['view']->render();
    }

    public function postLogin(Request $request, Application $app)
    {
        $login = $request->request->get('name');
        $pass = $request->request->get('pass');

        //Валидация
        $data = [
            'login' => $login,
            'password' => $pass,
            ];

        $constraint = new Assert\Collection(array(
            'login' => new Assert\Length(array('min' => 4)),
            'password' => array (new Assert\NotBlank(), new Assert\Length(array('max' => 10))),
        ));

        $errors = $app['validator']->validate($data,$constraint);

        if (count($errors) > 0) {
            $str = null;
            foreach ($errors as $error){
            $str .= $error->getPropertyPath().' '.$error->getMessage()."\n";
            }
            $app->abort(403, $str);
        } else {
            $session = $request->getSession();
            if ($login == 'test' && $pass == '123'){
                $session->set('logged', true);
                return $app->redirect('/cabinet');
            }
            return $app->redirect('/login');
        }
      }



    public function getLogout(Request $request, Application $app)
    {
        $session = $request->getSession();
        $session->clear();
        $session->invalidate();

        return $app->redirect('/');
    }
}
