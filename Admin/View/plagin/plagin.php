<?php
use Engine\Core\Database\Connection;
use Engine\Core\Database\QueryBuilder;

$this->theme->header();

function selectPlaginList()
{
        $queryBuilder = new QueryBuilder();
        $db = new Connection();

        $sql = $queryBuilder
            ->select()
            ->from('plagin')
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
                <h3>Plagins</h3>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="setting-tabs">

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <form action="/lynxcms/admin/plagins/" method="post" enctype="multipart/form-data" name="formPlagin">
                    <input type="file" name="attachment">
                    <input type="submit" value="Отправить файл">
                </form>
                <form class="form-horizontal" method="post" action="/lynxcms/admin/plagins/">
                <iframe id="hiddenframe" name="hiddenframe" style="width:0px;height:0px;border:0px"></iframe>
                <table id="othdetails" class="table table-hover borderbottom">
                    <thead>
                    <tr>
                        <th>№ п/п</th>
                        <th>Состояние файла</th>
                        <th>Файл</th>
                        <th>Описание</th>
                        <th>Выбор</th>
                    </tr>

                    <?php $plaginList =  selectPlaginList();?>
                    <?php foreach ($plaginList as $list):?>

                    </thead>
                    <tbody>
                    <tr>
                        <td class="col-xs-2 col-md-1" style="vertical-align:middle;"><?= $list['id']?></td>
                        <td class="col-xs-2 col-md-1" style="vertical-align:middle;">
                            <?php
                                switch ($list['active'])
                                {
                                    case 'included':
                                        echo 'Включен';
                                        break;
                                    case 'disabled':
                                        echo 'Выключен';
                                        break;
                                    case 'not found':
                                        echo 'Не найден';
                                        break;
                                    default:
                                        echo 'Не определен';
                                        break;
                                }
                                ?>
                        </td>
                        <td><textarea name="dform_oth_details_descr[]" class="form-control" rows="3" placeholder="Имя файла"><?= $list['file_name']?></textarea></td>
                        <td><textarea name="dform_oth_details_descr[]" class="form-control" rows="3" placeholder="Описание плагина"><?= $list['description']?></textarea></td>
                        <td style="vertical-align:middle;text-align:right;">
                            <input class="form-check-input" type="checkbox" name="<?= $list['id']?>">
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td class="col-xs-2 col-md-1" style="vertical-align:middle;"></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td style="vertical-align:middle;text-align:right;">
                            <button type="submit" class="btn btn-primary" onclick="plagin.delPlagin()">X</button> <!---->
                            <?php

                            if(!empty($_POST)){
                             echo '<pre>';
                             print_r($_POST);
                            } ?>
                        </td>
                    </tbody>
                </table>
                </form>
            </div>
        </div>
    </div>
</main>

<?php $this->theme->footer(); ?>