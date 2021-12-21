<?php

namespace Engine\DI;

class di
{
    /**
     * @var array
     */
    private $contaner = [];


    /**
     * @param $key
     * @param $value
     * @return $this
     */
    public function set($key, $value)
    {
        $this->contaner[$key] = $value;

        return $this;
    }

    /**
     * @param $key
     * @return mixed
     */
    public function get($key)
    {
        return $this->has($key);
    }

    /**
     * @param $key
     * @return mixed|null
     */
    public function has($key)
    {
        return isset($this->contaner[$key]) ? $this->contaner[$key] : NULL;
    }

    public function push($key, $elements = [])
    {
        if ($this->has($key) !== NULL)
        {
            $this->set($key, []);
        }

        if (!empty($elements))
        {
            $this->contaner[$key][$elements['key']] = $elements['value'];
        }

    }
}