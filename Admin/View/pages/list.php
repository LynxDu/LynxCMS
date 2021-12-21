<?php
//error_reporting (E_ALL ^ E_NOTICE);
use Engine\Core\Database\Connection;
use Engine\Core\Database\QueryBuilder;

$this->theme->header();


function selectPage()
{


    $queryBuilder = new QueryBuilder();
    $db = new Connection();

    $sql = $queryBuilder
        ->select()
        ->from('page')
        ->orderBy('id', 'ASC')
        ->sql();


    $query= $db->query($sql, $queryBuilder->values);

    //print_r($query);
    return $query;
}



?>

    <main>
        <div class="container">
            <div class="row">
                <div class="col page-title">
                    <h3>
                        Pages
                        <a href="/lynxcms/admin/pages/create/">Create page</a>
                    </h3>
                </div>
            </div>

            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Date</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $query = selectPage();
                foreach($query as $page): ?>
                        <tr>
                        <th scope="row">
                        <?php print_r($page['id']);   ?>
                            </th>
                            <td>
                                <a href="/lynxcms/admin/pages/edit/<?php print_r($page['id']); ?>">
                                <?php print_r($page['title']); ?>
                                </a>
                            </td>
                            <td>
                            <?php print_r($page['date']); ?>
                            </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </main>

<?php
$this->theme->footer();

?>