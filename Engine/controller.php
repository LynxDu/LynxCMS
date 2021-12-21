<?php

namespace Engine;

use Engine\DI\di;

abstract class controller
{
    /**
     * @var di
     */
    protected $di;

    /**
     * @var mixed|null
     */
    protected $db;

    protected $view;

    protected $config;

    protected $request;

    protected $load;

    protected $model;

    /**
     * @param di $di
     */
    public function __construct(di $di)
    {
        $this->di       = $di;
        $this->db       = $this->di->get('db');
        $this->view     = $this->di->get('view');
        $this->config   = $this->di->get('config');
        $this->request  = $this->di->get('request');
        $this->load     = $this->di->get('load');
        $this->model    = $this->di->get('model');
    }
}