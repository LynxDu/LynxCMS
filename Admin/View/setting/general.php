<?php
use Engine\Core\Database\Connection;
use Engine\Core\Database\QueryBuilder;

$this->theme->header();
function selectPage()
{
    $queryBuilder = new QueryBuilder();
    $db = new Connection();
    $admin = 'admin';
    $sql = $queryBuilder
        ->select()
        ->from('setting')
        ->sql();
    $query= $db->query($sql, $queryBuilder->values);
    return $query;
}

$settings = selectPage(); ?>

    <main>
        <div class="container">
            <div class="row">
                <div class="col page-title">
                    <h3>Settings</h3>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <form id="formSetting">
                        <?php foreach($settings as $setting):?>
                        <?php if ($setting['name'] == 'Language') { ?>
                                <div class="form-group row">
                            <label for="formLangSite" class="col-2 col-form-label">
                                <?= $setting['name'] ?>
                            </label>
                            <div class="col-10">
                                <select class="form-control" id="formLangSite">
                                    <option value="<?= $setting['value'] ?>"><?= $setting['value'] ?></option>
                                </select>
                            </div>
                        </div>
                        <?php } else { ?>
                                <div class="form-group row">
                                    <label for="formNameSite" class="col-2 col-form-label">
                                        <?= $setting['name'] ?>
                                    </label>
                                    <div class="col-10">
                                        <input class="form-control" type="text" name="<?= $setting['id'] ?>" value="<?= $setting['value'] ?>" id="formNameSite">
                                    </div>
                                </div>
                                <?php } ?>

                        <?php endforeach; ?>

                        <button type="submit" class="btn btn-primary" onclick="setting.updates(); return false;">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </main>

<?php $this->theme->footer(); ?>