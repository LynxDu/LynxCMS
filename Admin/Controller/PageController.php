<?php

namespace Admin\Controller;

use Engine\Core\Database\Connection;
use Engine\Core\Database\QueryBuilder;
use Admin\Model\Page\PageRepositiry;

class PageController extends AdminController
{



    public function listing()
    {
        $pageModel = $this->load->model('Page');
        //print_r($this->di);exit();

        $repositiry = new PageRepositiry($this->di); // Костыль, нужно так $data['pagas'] = $pageModel->repository->getPage();

        $data['pages'] = $repositiry->getPage();


        $this->view->render('pages/list', $data);
    }

    public function create()
    {
        $pageModel = $this->load->model('Page');

        $this->view->render('pages/create');
    }

    public function edit($id)
    {
        $pageModel = $this->load->model('Page');

        $repositiry = new PageRepositiry($this->di); // Костыль, нужно так $data['pagas'] = $pageModel->repository->getPage();

        $this->data['pages'] = $repositiry->getPageData($id);

        $this->view->render('pages/edit', $this->data);
    }

    public function add()
    {
        $this->load->model('Page');

        $params = $this->request->post;

        $repositiry = new PageRepositiry($this->di);

        $pageId = $repositiry->createPage($params);

        echo $pageId;
    }

    public function update()
    {
        $this->load->model('Page');

        $params = $this->request->post;

        $repositiry = new PageRepositiry($this->di);

        $pageId = $repositiry->updatePage($params);

        echo $pageId;
    }

}