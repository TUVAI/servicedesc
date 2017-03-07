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
                    <strong>Добавить должность</strong>
                </div>
                <div class="panel-body">
                    <?php echo form_open('admin/add_position'); ?>
                    <label for="username">Должность</label>
                    <?php $errorName = form_error("name", "<p class='text-danger'>", '</p>'); ?>
                    <div class="form-group <?php echo $errorName ? 'has-error' : '' ?>">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-user"></i>
                            </span>
                            <?= form_input('name', '', 'class="form-control" placeholder="Должность"')?>
                        </div>
                        <?= $errorName; ?>
                    </div>

                    <?= form_submit('submit', 'Добавить должность', 'class="btn btn-primary"')?>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>