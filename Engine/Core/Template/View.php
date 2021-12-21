<?php

namespace Engine\Core\Template;

use Engine\Core\Template\Theme;
use Engine\DI\di;

class View
{
    /**
     * @var \Engine\Core\Template\Theme
     */
    protected $theme;

    /**
     *
     */
    public function __construct()
    {
        $this->theme = new Theme();
    }

    /**
     * @param $tamplate
     * @param array $vars
     */
    public function render($template, $vars = [])
    {
        $templatePath = $this->getTemplatePath($template, ENV);

        if (!is_file($templatePath)) {
            throw new \InvalidArgumentException(
                sprintf('Template "%s" not found in "%s"', $template, $templatePath)
            );
        }


        $this->theme->setData($vars);
        extract($vars);

        ob_start();
        ob_implicit_flush(0);

        try {
            require($templatePath);
        } catch (\Exception $e){
            ob_end_clean();
            throw $e;
        }

        echo ob_get_clean();
    }


    /**
     * @param $template
     * @param null $env
     * @return string
     */
    private function getTemplatePath($template, $env = null)
    {

        if ($env === 'Cms')
        {
            return ROOT_DIR . '/Content/Thems/default/' . $template . '.php';
        }

        return ROOT_DIR . '/View/' . $template . '.php';


        /*
        switch ($env) {                                                                         /////// Старый вариант
            case 'Admin':
                return ROOT_DIR . '/View/' . $template . '.php';
                break;
            case 'Cms':
                return ROOT_DIR . '/Content/Thems/default/' . $template . '.php';
                break;
            default:
                return ROOT_DIR . '/' . mb_strtolower($env) . '/View/' . $template . '.php';
        }
        */
    }


}