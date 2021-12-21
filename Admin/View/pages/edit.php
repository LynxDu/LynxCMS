<?php
use Admin\Model\Page\PageRepositiry;
use Engine\Core\Database\Connection;
use Engine\Core\Database\QueryBuilder;
function selectOnePage($id)
{
    $queryBuilder = new QueryBuilder();
    $db = new Connection();
    $sql = $queryBuilder
        ->select()
        ->from('page')
        ->where('id', $id)
        ->sql();
    $query= $db->query($sql, $queryBuilder->values);
    //print_r($query);
    return $query;
}
$this->theme->header(); ?>

    <main>
        <div class="container">
            <div class="row">
                <div class="col page-title">
                    <h3><?php $url = $_SERVER["REQUEST_URI"];?>
                        <?php $id = basename($url, '');?>
                        <?php $one = selectOnePage($id);?>

                        <?= $one[0]['title']; ?> </h3>
                </div>
            </div>
            <div class="row">
                <div class="col-9">
                    <form id="formPage">
                        <input type="hidden" name="page_id" id="formPageId" value="<?= $one[0]['id']; ?>" />
                        <div class="form-group">
                            <label for="formTitle">Title</label>
                            <input type="text" name="title" class="form-control" id="formTitle" value="<?= $one[0]['title']; ?>" placeholder="Title page...">
                        </div>
                        <div class="form-group">
                            <label for="formContent">Content</label>
<!--                            <input type="text" name="content" class="form-control" id="formContent" placeholder="">-->
                            <textarea name="content" class="form-control" id="formContent"><?= $one[0]['content']; ?></textarea>
                        </div>
                    </form>
                </div>
                <div class="col-3">
                    <div>
                        <p>Update this page</p>
                        <button type="submit" class="btn btn-primary" onclick="page.update()">
                            Update
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </main>

<?php $this->theme->footer(); ?>