<?php

namespace Engine;

use Engine\Core\Database\QueryBuilder;
use Engine\DI\di;

abstract class Model
{
    /**
     * @var DI
     */
    protected $di;

    protected $db;

    protected $config;

    public $queryBuilder;

    /**
     * Model constructor.
     * @param $di
     */
    public function __construct(di $di)
    {
        $this->di      = $di;
        $this->db      = $this->di->get('db');
        $this->config  = $this->di->get('config');

        $this->queryBuilder = new QueryBuilder();
    }
}