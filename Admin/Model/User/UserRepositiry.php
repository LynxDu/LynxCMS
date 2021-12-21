<?php

namespace Admin\Model\User;

use Engine\Core\Database\Connection;
use Engine\Core\Database\QueryBuilder;
use Engine\Model;

class UserRepositiry extends Model
{
    public function getUser()
    {
        $queryBuilder = new QueryBuilder();
        $db = new Connection();

        $sql = $queryBuilder
            ->select()
            ->from('user')
            ->orderBy('id', 'DESC')
            ->sql();


        $query= $db->query($sql, $queryBuilder->values);

        //print_r($query);

        return $query;
    }

    public function test()
    {
        $user = new User;
        $user->setEmail('admin@admin.com');
        $user->setPassword(md5('admin'));
        $user->setRole('admin');
        $user->setHash('');
        $user->save();
    }
}