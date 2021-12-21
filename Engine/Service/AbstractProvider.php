<?php

namespace Engine\Service;

abstract class AbstractProvider
{
    /**
     * @var \Engine\DI\di
     */
    protected $di;

    /**
     * @param \Engine\DI\di $di
     */
    public function __construct(\Engine\DI\di $di)
    {
        $this->di = $di;
    }

    /**
     * @return mixed
     */
    abstract function init();
}