<?php

namespace Engine\Core\Config;

class Config
{
    /**
     * @param $key
     * @param string $group
     * @return mixed|null
     * @throws \Exception
     */
    public static function item($key, $group = 'main')
    {
        $groupItems = static::file($group);

        return isset($groupItems[$key]) ? $groupItems[$key] : NULL;
    }

    /**
     * @param $group
     * @return array
     * @throws \Exception
     */
    public static function file($group)
    {
        $path = $_SERVER['DOCUMENT_ROOT'] . '/LynxCMS/' . mb_strtolower(ENV) . '/Config/' . $group . '.php';  //////////Изменить при передвижении
        //$path = $_SERVER['DOCUMENT_ROOT'] . '/LynxCMS/Admin/Config/' . $group . '.php';

        //print_r($path);

        if(file_exists($path))
        {
            $items = require_once $path;

            if(!empty($items))
            {
                return $items;
            }
            else
            {
                throw new \Exception(
                    sprintf('Файл Config <strong>%s</strong> не является массивом.', $path)
                );
            }


        }
        else
        {
            throw new \Exception(
                sprintf('Ошибка загрузки файла, файл <strong>%s</strong> не существует.', $path)
            );
        }

        return false;
    }
}