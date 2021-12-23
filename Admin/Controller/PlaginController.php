<?php

namespace Admin\Controller;

use Engine\Core\Database\Connection;
use Engine\Core\Database\QueryBuilder;

class PlaginController extends AdminController
{
    public function plagins()
    {
        $this->view->render('plagin/plagin');




    }

    public function add()
    {
        if (!empty($_FILES['attachment'])) {
            $file = $_FILES['attachment'];

            // собираем путь до нового файла - папка uploads в текущей директории
            // в качестве имени оставляем исходное файла имя во время загрузки в браузере
            $srcFileName = $file['name'];

            $newFilePath = __DIR__ . '/../view/plagin/file/' . $srcFileName;
            $FilePath = __DIR__ . '/../view/plagin/file/';

            if (!move_uploaded_file($file['tmp_name'], $newFilePath)) {
                $error = 'Ошибка при загрузке файла';
                echo $error;
            } else {
                $result = __DIR__. ' ' . $srcFileName;
                $queryBuilder = new QueryBuilder();
                $db = new Connection();

                $sql = $queryBuilder
                    ->insert('plagin')
                    ->set(
                        [
                            'id' => 'NULL',
                            'file_name' => $srcFileName,
                            'path' => $newFilePath,
                            'active' => 'included',
                            'description' => $FilePath
                        ]
                    )
                    ->sql();

                $db->execute($sql, $queryBuilder->values);
            }
        } else {
            $params = $this->request->post;
            //print_r($params);

            $queryBuilder = new QueryBuilder();
            $db = new Connection();

            $sql = $queryBuilder
                ->select()
                ->from('plagin')
                ->orderBy('id', 'ASC')
                ->sql();

            $query= $db->query($sql, $queryBuilder->values);

            //print_r($query);

            foreach ($query as $plaginList):
                if ($params[$plaginList['id']]){

                    $sql1 = $queryBuilder
                        ->delete()
                        ->from('plagin')
                        ->where('id',$plaginList['id'])
                        ->sql();

                    $db->query($sql1, $queryBuilder->values);

                }




                endforeach;
        }
        header('Location: /lynxcms/admin/plagins/');

    }

    public function del()
    {

    }
    public function activ()
    {

    }

}