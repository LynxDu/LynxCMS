<?php

namespace Engine\Core\Database;


use Engine\Core\Database\Connection;
use \ReflectionClass;
use \ReflectionProperty;
use Engine\Core\Database\QueryBuilder;

trait ActiveRecord
{

   protected $db;


    protected $queryBuilder;



    /**
     * ActiveRecord constructor.
     * @param int $id
     */
    public function __construct($id = 0)
    {
        global $di;

        $this->db           = $di->get('db');
        $this->queryBuilder = new QueryBuilder();

        if ($id) {
            $this->setId($id);
        }
    }

    /**
     * @return string
     */
    public function getTable()
    {
        return $this->table;
    }

    public function findOne()
    {
        $db = new Connection();
        $queryBuilder = new QueryBuilder();

        $sql = $queryBuilder
            ->select()
            ->from($this->getTable())
            ->where('id', $this->id)
            ->sql();

        $find = $db->query($sql, $queryBuilder->values);

        return isset($find[0]) ? $find[0] : NULL;


    }

    /**
     *  Save User
     */
    public function save()
    {

        //$config = require_once 'config.php';
        $db = new Connection();
        $queryBuilder = new QueryBuilder();

        $properties = $this->getIssetProperties();
        try {
            if (isset($this->id)) {
                $sql = $queryBuilder
                    ->update($this->getTable())
                    ->set($properties)
                    ->where('id', $this->id)
                    ->sql();

                $db->execute($sql, $queryBuilder->values);
            } else {
                $sql = $queryBuilder
                    ->insert($this->getTable())
                    ->set($properties)
                    ->sql();

                $db->execute($sql, $queryBuilder->values);
            }
            $db = new Connection();
            //print_r($db->lastInsertId());
            return $db->lastInsertId();
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * @return array
     */
    private function getIssetProperties()
    {
        $properties = [];

        foreach ($this->getProperties() as $key => $property) {
            if (isset($this->{$property->getName()})) {
                $properties[$property->getName()] = $this->{$property->getName()};
            }
        }

        return $properties;
    }

    /**
     * @return ReflectionProperty[]
     */
    private function getProperties()
    {
        $reflection = new ReflectionClass($this);
        $properties = $reflection->getProperties(ReflectionProperty::IS_PUBLIC);

        return $properties;
    }
}