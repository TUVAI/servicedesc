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
                    <strong>Добавить компанию</strong>
                </div>
                <div class="panel-body">
                    <?php echo form_open('admin/add_company'); ?>
                    <label for="username">Имя компании</label>
                    <?php $errorName = form_error("name", "<p class='text-danger'>", '</p>'); ?>
                    <div class="form-group <?php echo $errorName ? 'has-error' : '' ?>">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-user"></i>
                            </span>
                            <?= form_input('name', '', 'class="form-control" placeholder="Имя компании"')?>
                        </div>
                        <?= $errorName; ?>
                    </div>

                    <?php $errorFname = form_error("fullname", "<p class='text-danger'>", '</p>'); ?>
                    <div class="form-group <?php echo $errorFname ? 'has-error' : '' ?>">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-user"></i>
                            </span>
                            <?= form_input('fullname', '', 'class="form-control" placeholder="Полное имя"')?>
                        </div>
                        <?= $errorFname; ?>
                    </div>

                    <?php $errorSname = form_error("shortname", "<p class='text-danger'>", '</p>'); ?>
                    <div class="form-group <?php echo $errorSname ? 'has-error' : '' ?>">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-user"></i>
                            </span>
                            <?= form_input('shortname', '', 'class="form-control" placeholder="Короткое имя"')?>
                        </div>
                        <?= $errorSname; ?>
                    </div>
                    <?= form_submit('submit', 'Добавить компанию', 'class="btn btn-primary"')?>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>