<?php

namespace Cms\Controller;

class ErrorController extends CmsController
{
    public function page404()
    {
        echo '<h1>Путь в никуда (404)</h1>';
    }

}