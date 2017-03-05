<br>
<br>
<br>
<br>
<div class="container" style="margin-top: 80px">
    <? if (isset($info)) { ?>
        <div class="alert alert-success">
            <strong>Успех!</strong> <?= $info ?>
        </div>
    <? } ?>
    <div class="row">
        <div class="col-md-4 col-xs-6 col-md-offset-4 col-xs-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <strong>Удалить компанию</strong>
                </div>
                <div class="panel-body">
                    <?php echo form_open('admin/del_company/' . $company['id']); ?>
                    <label for="username">Вы действительо хотите удалить компанию "<?=$company['fullname']?>"</label>

                    <input type="checkbox" name="check" value="yes" /> Подтвердив, вы удалите компанию и все отделы и т.д.<br>

                    <?= form_submit('submit', 'Удалить компанию', 'class="btn btn-warning"')?>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>