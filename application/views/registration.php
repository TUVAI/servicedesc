<h1 style="text-align: center">Регистрация</h1>

<div class="container">
    <div class="row login-wrapper">
        <div class="col-md-4 col-xs-6 col-md-offset-4 col-xs-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <strong>Форма регистрации</strong>
                </div>
                <div class="panel-body">
                    <?php echo form_open('auth/registration'); ?>
                    <?php $error = form_error("username", "<p class='text-danger'>", '</p>'); ?>
                    <div class="form-group <?php echo $error ? 'has-error' : '' ?>">
                        <label for="username">Username</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-user"></i>
                            </span>
                            <?= form_input('lname', set_value('lname', 'Фамилия'), 'class="form-control"')?>
                        </div>
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-user"></i>
                            </span>
                            <?= form_input('fname', set_value('fname', 'Имя'), 'class="form-control"')?>
                        </div>
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-user"></i>
                            </span>
                            <?= form_input('sname', set_value('sname', 'Отчество'), 'class="form-control"')?>
                        </div>
                        <?php echo $error; ?>
                    </div>

                    <div class="form-group <?php echo $error ? 'has-error' : '' ?>">
                        <label for="password">Электронная почта</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-envelope"></i>
                            </span>
                            <?= form_input('email', set_value('email', 'E-mail'), 'class="form-control"')?>
                        </div>
                    </div>

                    <div class="form-group <?php echo $error ? 'has-error' : '' ?>">
                        <label for="password">Логин</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-user"></i>
                            </span>
                            <?= form_input('username', set_value('username', 'Логин'), 'class="form-control"')?>
                        </div>
                    </div>
                    <?php $error = form_error("password", "<p class='text-danger'>", '</p>'); ?>
                    <div class="form-group <?php echo $error ? 'has-error' : '' ?>">
                        <label for="password">Пароль</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-lock"></i>
                            </span>
                            <?= form_password('password', '', 'placeholder="Пароль" class="form-control"')?>
                        </div>
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-lock"></i>
                            </span>
                            <?= form_password('confirm_password', '', 'placeholder="Подтвердить пароль" class="form-control"')?>

                        </div>
                        <?php echo $error; ?>
                    </div>
                    <?= form_submit('submit', 'Зарегистрироваться', 'class="btn btn-primary"')?>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>