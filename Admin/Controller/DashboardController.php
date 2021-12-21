<?php

namespace Admin\Controller;

use Admin\Model\User\UserRepositiry;

class DashboardController extends AdminController
{
    public function index()
    {
        $userModel = new UserRepositiry($this->di);
        $userModel->getUser();
        $this->load->model('user');
        $userModel->test();
        $this->view->render('dashboard');
        $this->load->language('dashboard/menu');
    }
}