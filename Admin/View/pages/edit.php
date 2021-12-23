<?php
use Admin\Model\Page\PageRepositiry;
use Engine\Core\Database\Connection;
use Engine\Core\Database\QueryBuilder;
function selectOnePage()
{
    $queryBuilder = new QueryBuilder();
    $db = new Connection();
    $sql = $queryBuilder
        ->select()
        ->from('page')
        //->where('id', $id)
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
                        <?php $oneId = count($one)-1;?>
                        <?= $one[$oneId]['title']; ?> </h3>
                </div>
            </div>
            <div class="row">
                <div class="col-9">
                    <form id="formPage">
                        <input type="hidden" name="page_id" id="formPageId" value="<?= $one[$oneId]['id']; ?>" />
                        <div class="form-group">
                            <label for="formTitle">Title</label>
                            <input type="text" name="title" class="form-control" id="formTitle" value="<?= $one[$oneId]['title']; ?>" placeholder="Title page...">
                        </div>
                        <div class="form-group">
                            <label for="formContent">Content</label>
<!--                            <input type="text" name="content" class="form-control" id="formContent" placeholder="">-->
                            <!-- Include Editor style. -->
                            <link href="https://cdn.jsdelivr.net/npm/froala-editor@latest/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />

                            <!-- Create a tag that we will use as the editable area. -->
                            <!-- You can use a div tag as well. -->
                            <textarea name="content" id="formContent"><?= $one[$oneId]['content']; ?></textarea>

                            <!-- Include Editor JS files. -->
                            <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/froala-editor@latest/js/froala_editor.pkgd.min.js"></script>

                            <!-- Initialize the editor. -->
                            <script>
                                new FroalaEditor('textarea');
                            </script>

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