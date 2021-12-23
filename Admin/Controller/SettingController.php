<?php

namespace Admin\Controller;

use Admin\Model\Setting\SettingRepository;

class SettingController extends AdminController
{
    public function general()
    {
        $this->load->model('Setting');
        $this->view->render('setting/general');
    }

    public function updateSetting()
    {
        $this->load->model('Setting');

        $params = $this->request->post;

        //print_r($params);

        //echo 11;

        $repository = new SettingRepository($this->di);

        $setting = $repository->update($params);

        //$setting1 = $this->model->setting->update($params);

        echo $setting;
    }

}