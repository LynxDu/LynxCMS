<?php

namespace Admin\Model\Page;

use Engine\Core\Database\Connection;
use Engine\Core\Database\QueryBuilder;
use Engine\Model;

class PageRepositiry extends Model
{
    public function getPage()
    {
        $queryBuilder = new QueryBuilder(); //
        $db = new Connection();

        $sql = $queryBuilder
            ->select()
            ->from('page')
            ->orderBy('id', 'DESC')
            ->sql();


        $query= $db->query($sql, $queryBuilder->values);

        //print_r($query);

        return $query;
    }

    public function getPageData($id)
    {
        //print_r($id);

        $page = new Page($id);

        //print_r($page->findOne());

        return $page->findOne();
    }

    /**
     * @param $params
     */
    public function createPage($params)
    {
        $page = new Page;
        $page->setTitle($params['title']);
        $page->setContent($params['content']);
        $pageId = $page->save();

        return $pageId ;
    }

    public function updatePage($params)
    {
        if (isset($params['page_id']))
        {
            $page = new Page($params['page_id']);
            $page->setTitle($params['title']);
            $page->setContent($params['content']);
            $page->save();
        }

    }


}