<?php

namespace Engine\Core\Template;

class Theme
{
    /**
     * Rules template name
     */
    const RULES_NAME_FILE = [
        'header'  => 'header-%s',
        'footer'  => 'footer-%s',
        'sidebar' => 'sidebar-%s',
    ];

    /**
     * @var string
     */
    static $url = '';

    /**
     * @var array
     */
    protected $data = [];

    /**
     * @param null $name
     * @throws \Exception
     */
    public function header($name = NULL)
    {
        $name = (string) $name;
        $file = 'header';

        if($name !== '')
        {
            $file = sprintf(self::RULES_NAME_FILE['header'], $name);
        }

        $this->loadTamplateFile($file);


        //$name = (string) $name;
        //$name = $name !== '' ? sprintf(self::RULES_NAME_FILE['header'], $name) : 'header';
        //$this->loadTemplateFile($name);
    }

    /**
     * @param string $name
     * @throws \Exception
     */
    public function footer($name = '')
    {
        $name = (string) $name;
        $file = 'footer';

        if($name !== '')
        {
            $file = sprintf(self::RULES_NAME_FILE['footer'], $name);
        }

        $this->loadTamplateFile($file);
    }

    /**
     * @param string $name
     * @throws \Exception
     */
    public function sidebar($name = '')
    {
        $name = (string) $name;
        $file = 'sidebar';

        if($name !== '')
        {
            $file = sprintf(self::RULES_NAME_FILE['sidebar'], $name);
        }

        $this->loadTamplateFile($file);
    }

    /**
     * @param string $name
     * @param array $data
     * @throws \Exception
     */
    public function block($name = '', $data = [])
    {
        $name = (string) $name;

        if($name !== '')
        {
            $this->loadTamplateFile($name, $data);
        }


    }

    /**
     * @param $nameFile
     * @param array $data
     * @throws \Exception
     */
    private function loadTamplateFile($nameFile, $data = [])
    {
        $tamplateFile = ROOT_DIR . '/Content/Thems/default/' . $nameFile . '.php';
        if (ENV == 'Admin')
        {
            $tamplateFile = ROOT_DIR . '/View/' . $nameFile . '.php';
        }


        if(is_file($tamplateFile))
        {
            extract(array_merge($data, $this->data));
            require_once $tamplateFile;
        }
        else
        {
            throw new \Exception(
                sprintf('View file %s does not exist!', $tamplateFile)
            );
        }
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param array $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }


}