<?php

namespace Admin\Controller;

use Engine\controller;
use Engine\DI\di;
use Engine\Core\Auth\Auth;
use DBStart\DatabaseStart;
use Engine\Core\Database\Connection;
use Engine\Core\Database\QueryBuilder;

class LoginController extends Controller
{
    /**
     * @var Auth
     */
    protected $auth;

    /**
     * @param di $di
     */
    public function __construct(di $di)
    {
        parent::__construct($di);

        $this->auth = new Auth();

        if ($this->auth->hashUser() !== NULL)
        {
            header('Location: /lynxcms/admin/');
            exit;
        }
    }

    /**
     *
     */
    public function form()
    {
        //print_r($this->request->server);
        $this->view->render('login');
    }

    public function authAdmin()
    {
        $params = $this->request->post;

        $queryBuilder = new QueryBuilder();
        $db = new Connection();

        $sql = $queryBuilder
            ->select()
            ->from('user')
            ->where('email', $params['email'])
            ->where('password', md5($params['password']))
            ->limit(1)
            ->sql();


        $query= $db->query($sql, $queryBuilder->values); //'Select * from `user` WHERE `email`= \'' . $params['email'] . '\' AND `password` = \'' . md5($params['password']) . '\' LIMIT 1 '
        //$query = $this->db->query('SELECT * FROM `user` WHERE `email`= \'' . $params['email'] . '\' AND `password` = \'' . md5($params['password']) . '\' LIMIT 1 '); // не работает (как в уроке)

        if (!empty($query))
        {
            $user = $query[0];

            if ($user['role'] == 'admin')
            {
                $hash = md5($user['id'] . $user['email'] . $user['password'] . $this->auth->salt());

                $sql = $queryBuilder
                    ->update('user')
                    ->set(['hash' => $hash])
                    ->where('id', $user['id'])
                    ->sql();

                $db->execute($sql, $queryBuilder->values); //'update `user` set `hash` = \'' . $hash . '\' where `id` = \'' . $user['id'] . '\''

                $this->auth->authorize($hash);

                header('Location: /lynxcms/admin/login/');
                exit;
            }
        }

        echo 'Неправильный логин или пароль.';

        //$this->auth->authorize('LynxDk');

        //print_r($params);
    }
}