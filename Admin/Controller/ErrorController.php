<?php

namespace Admin\Controller;

class ErrorController extends AdminController
{
    public function page404()
    {
        echo '<h1>Путь в никуда (404)</h1>';
    }

}