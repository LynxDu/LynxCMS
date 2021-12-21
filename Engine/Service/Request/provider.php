<?php

namespace Engine\Service\Request;

use Engine\Service\AbstractProvider;
use Engine\Core\Request\Request;

class provider extends AbstractProvider
{
    /**
     * @var string
     */
    public $serviceName = 'request';

    /**
     * @return mixed
     */
    public function init()
    {
        $request = new Request();

        $this->di->set($this->serviceName, $request);
    }
}