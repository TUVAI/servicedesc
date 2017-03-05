<br>
<br>
<br>
<br>
<div class="container" style="margin-top: 80px">
    <div class="row">
        <div class="col-md-4 col-xs-6 col-md-offset-4 col-xs-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <strong>Добавить пользователя</strong>
                </div>
                <div class="panel-body">
                    <?php echo form_open('admin/del_user/' . $user['id']); ?>
                    <label for="username">Вы действительо хотите удалить пользователя "<?=$user['lname']?> <?=$user['fname']?> <?=$user['sname']?>"</label>

                    <input type="checkbox" name="check" value="yes" /> Подтвердив, вы удалите компанию и все отделы и т.д.<br>

                    <?= form_submit('submit', 'Удалить пользователя', 'class="btn btn-warning"')?>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>