<?php
namespace Engine;

use Engine\Core\Database\Connection;
use Engine\Core\Database\QueryBuilder;
use Engine\Core\Router\DispatchedRoute;
use Engine\DI\di;
use Engine\Helper\Common;
use Engine\Core\Router\UrlDispatcher;

class cms
{
    /**
     * @var di
     */
    private $di;

    public $router;

    /**
     * cms constructor.
     * @param $di
     */
    public function __construct($di)
    {
        $this->di = $di;
        $this->router = $this->di->get('router');
    }

    public function fileView()
    {
        $queryBuilder = new QueryBuilder();
        $db = new Connection();

        $value = 'included';

        $sql = $queryBuilder
            ->select()
            ->from('plagin')
            ->where('active', $value)
            ->sql();

        $plaginView= $db->query($sql, $queryBuilder->values);

        $pathDir = 'C:\xampp\htdocs\LynxCMS\Admin\Controller/../view/plagin/file/';

        $dirFile = array_filter(scandir($pathDir), function($item) {
            return !is_dir('C:\xampp\htdocs\LynxCMS\Admin\Controller/../view/plagin/file/' . $item);
        });


        if (!empty($dirFile)){
            foreach ($plaginView as $view):

                foreach ($dirFile as $dir):
                    if ($dir == $view['file_name']) {

                        require_once $view['path'];

                    } else{

                        $sql = $queryBuilder
                            ->update('plagin')
                            ->set([$view['active'] => 'disabled'])
                            ->where('id', $view['id'])
                            ->sql();

//                    print_r($sql);
//                    print_r($queryBuilder->values);

                        $db->execute($sql, $queryBuilder->values);

                    }
                endforeach;

            endforeach;
        } else {

            foreach ($plaginView as $view):

                if ($view['active'] !== 'not found') {

                    $sql = $queryBuilder
                        ->update('plagin')
                        ->set(['active' => 'not found'])
                        ->where('id', $view['id'])
                        ->sql();

                    $db->execute($sql, $queryBuilder->values);
                }

            endforeach;


        }
    }

    /**
     * Run CMS
     */
    public function run()
    {
        try {
            $this->fileView();

            require_once __DIR__ . '/../' . mb_strtolower(ENV) . '/Route.php';

            $routerDispatch = $this->router->dispatch(Common::getMethod(), Common::getPathUrl());

            if ($routerDispatch == NULL) {
                $routerDispatch = new DispatchedRoute('ErrorController:page404');
            }

            list($class, $action) = explode(':', $routerDispatch->getController(), 2);

            $controller = '\\' . ENV . '\\Controller\\' . $class;

            $parameters = $routerDispatch->getParameters();

            //print_r($parameters);

            call_user_func_array([new $controller($this->di), $action], $parameters);



        }catch (\Exception $e){

            echo $e->getMessage();
            exit;
        }

        //print_r($routerDispatch) ;

    }
}