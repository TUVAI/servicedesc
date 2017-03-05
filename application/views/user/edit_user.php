<br />
<br />
<br />

<?php
foreach ($departments as $department) {
    if ($department['company_id'] === $user['company_id']) {
        $dep[$department['id']] = $department['fullname'];}
} ?>
<h1 style="text-align: center">Регистрация</h1>

<div class="container">
    <? if (isset($info)) { ?>
        <div class="alert alert-success">
            <strong>Успех!</strong> <?= $info ?>
        </div>
    <? } ?>
    <div class="row">
        <div class="col-md-4 col-xs-6 col-md-offset-4 col-xs-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <strong>Редактировать данные пользователя</strong>
                </div>
                <div class="panel-body">
                    <?php echo form_open('admin/edit_user/' . $user['id']); ?>
                    <?php $errorLname = form_error("lname", "<p class='text-danger'>", '</p>'); ?>
                    <div class="form-group <?php echo $errorLname ? 'has-error' : '' ?>">
                        <label for="username">Персональные данные</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-user"></i>
                            </span>
                            <?= form_input('lname', $user['lname'], 'class="form-control" placeholder="Фамилия"')?>
                        </div>
                        <?= $errorLname; ?>
                    </div>

                    <?php $errorFname = form_error("fname", "<p class='text-danger'>", '</p>'); ?>
                    <div class="form-group <?php echo $errorFname ? 'has-error' : '' ?>">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-user"></i>
                            </span>
                            <?= form_input('fname', $user['fname'], 'class="form-control" placeholder="Имя"')?>
                        </div>
                        <?= $errorFname; ?>
                    </div>

                    <?php $errorSname = form_error("sname", "<p class='text-danger'>", '</p>'); ?>
                    <div class="form-group <?php echo $errorSname ? 'has-error' : '' ?>">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-user"></i>
                            </span>
                            <?= form_input('sname', $user['sname'], 'class="form-control" placeholder="Отчество"')?>
                        </div>
                        <?= $errorSname; ?>
                    </div>

                    <?php $errorCompany = form_error("company", "<p class='text-danger'>", '</p>'); ?>
                    <div class="form-group <?php echo $errorSname ? 'has-error' : '' ?>">
                        <div class="input-group">
                            <span class="input-group-addon">
                                Компания
                            </span>
                            <?= form_dropdown('company_id', $companies, $user['company_id'], ' id="company_id" class="form-control"')?>
                        </div>
                        <?= $errorCompany; ?>
                    </div>

                    <?php $errorDepartment = form_error("department", "<p class='text-danger'>", '</p>'); ?>
                    <div class="form-group <?php echo $errorDepartment ? 'has-error' : '' ?>">
                        <div class="input-group">
                            <span class="input-group-addon">
                                Отдел
                            </span>
                            <?= form_dropdown('department_id', $dep, $user['department_id'], ' id="department_id" class="form-control"')?>
                        </div>
                        <?= $errorDepartment; ?>
                    </div>

                    <?php $errorPosition = form_error("position_id", "<p class='text-danger'>", '</p>'); ?>
                    <div class="form-group <?php echo $errorPosition ? 'has-error' : '' ?>">
                        <div class="input-group">
                            <span class="input-group-addon">
                                Должность
                            </span>
                            <?= form_dropdown('position_id', $positions, $user['position_id'], 'class="form-control"')?>
                        </div>
                        <?= $errorPosition; ?>
                    </div>

                    <?php $errorRole = form_error("role", "<p class='text-danger'>", '</p>'); ?>
                    <div class="form-group <?php echo $errorRole ? 'has-error' : '' ?>">
                        <div class="input-group">
                            <span class="input-group-addon">
                                Роль
                            </span>
                            <?= form_dropdown('role_id', $roles, $user['role_id'], 'class="form-control"')?>
                        </div>
                        <?= $errorRole; ?>
                    </div>

                    <?php $errorEmail = form_error("email", "<p class='text-danger'>", '</p>'); ?>
                    <div class="form-group <?= $errorEmail ? 'has-error' : '' ?>">
                        <label for="password">Электронная почта</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-envelope"></i>
                            </span>
                            <?= form_input('email', $user['email'], 'class="form-control" placeholder="E-mail"')?>
                        </div>
                        <?= $errorEmail ?>
                    </div>

                    <?php $errorPhone = form_error("phone", "<p class='text-danger'>", '</p>'); ?>
                    <div class="form-group <?= $errorPhone ? 'has-error' : '' ?>">
                        <label for="password">Телефон</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-phone"></i>
                            </span>
                            <?= form_input('phone', $user['phone'], 'class="form-control" placeholder="Телефон"')?>
                        </div>
                        <?= $errorPhone ?>
                    </div>

                    <input type="hidden" name="username" value="<?=$user['login']?>">
                    <?= form_submit('submit', 'Редактировать данные', 'class="btn btn-primary"')?>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modalError" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
            </div>
            <div class="modal-body">
                <div class="error" id="errorModal"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
