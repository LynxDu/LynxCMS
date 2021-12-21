<?php

namespace Engine\Core\Database;

use Engine\Core\Config\Config;
use \PDO;

class Connection
{
    /**
     * @var
     */
    private $link;

    /**
     *
     */
    public function __construct()
    {
        $this->connect();
    }

    /**
     * @return $this
     */
    private function connect()
    {


        $config = require 'config.php';

        $dsn = 'mysql:host='.$config['host'].';dbname='.$config['db_name'].';charset='.$config['charset'];

        $this->link = new PDO($dsn, $config['username'], $config['password']);

        return $this;
    }

    /**
     * @param $sql
     * @param array $values
     * @return mixed
     */
    public function execute($sql, $values = [])
    {
        $sth = $this->link->prepare($sql);

        return $sth->execute($values);
    }


    /**
     * @param $sql
     * @param array $values
     * @return array
     */
    public function query($sql, $values = [], $statement = PDO::FETCH_OBJ) //FETCH_OBJ передача объектов, FETCH_ASSOC передача массивов
    {
        $sth = $this->link->prepare($sql);

        $sth-> execute($values);

        $result = $sth->fetchAll(PDO::FETCH_ASSOC);

        if($result === false)
        {
            return [];
        }
        else
        {
            return $result;
        }
    }

    public function lastInsertId()
    {
        return $this->link->lastInsertId();
    }

}

$db = new Connection();
//print_r($db->query('Select * from `user`'));
/*
	     //$config = require_once 'config.php';
        $config = [
            'host' => 'localhost',
            'db_name' => 'cms',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8'
        ];

        //$config = Config::file('database');
		//print_r($config);
		$dsn = 'mysql:host='.$config['host'].';dbname='.$config['db_name'].';charset='.$config['charset'];

		$this->link = new PDO($dsn, $config['username'], $config['password']);

        //$config = Config::file('database');
        */