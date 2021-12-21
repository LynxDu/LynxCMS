<?php

namespace Admin\Controller;

use Engine\controller;
use Engine\Core\Auth\Auth;

class AdminController extends controller
{
    /**
     * @var Auth
     */
    protected $auth;

    public $data = [];


    /**
     * @param $di
     */
    public function __construct($di)
    {
        parent::__construct($di);

        $this->auth = new Auth();



        if ($this->auth->hashUser() == NULL)
        {
            header('Location: /lynxcms/admin/login/');
            exit;
        }

        $this->load->language('dashboard/menu');
    }

    /**
     *  Проверка на авторизовацию пользователя
     */
    public function checkAuthorization()
    {

    }

    public function logout()
    {
        $this->auth->unAuthorize();
        header('Location: /lynxcms/admin/login/');
        exit;
    }

}