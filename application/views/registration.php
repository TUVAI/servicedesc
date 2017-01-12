<h1 style="text-align: center">Регистрация</h1>

<div class="container">
    <div class="row">
        <div class="col-md-4 col-xs-6 col-md-offset-4 col-xs-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <strong>Форма регистрации</strong>
                </div>
                <div class="panel-body">
                    <?php echo form_open('auth/registration'); ?>
                    <?php $errorLname = form_error("lname", "<p class='text-danger'>", '</p>'); ?>
                    <div class="form-group <?php echo $errorLname ? 'has-error' : '' ?>">
                        <label for="username">Персональные данные</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-user"></i>
                            </span>
                            <?= form_input('lname', set_value('lname'), 'class="form-control" placeholder="Фамилия"')?>
                        </div>
                        <?= $errorLname; ?>
                    </div>

                    <?php $errorFname = form_error("fname", "<p class='text-danger'>", '</p>'); ?>
                    <div class="form-group <?php echo $errorFname ? 'has-error' : '' ?>">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-user"></i>
                            </span>
                            <?= form_input('fname', set_value('fname'), 'class="form-control" placeholder="Имя"')?>
                        </div>
                        <?= $errorFname; ?>
                    </div>

                    <?php $errorSname = form_error("sname", "<p class='text-danger'>", '</p>'); ?>
                    <div class="form-group <?php echo $errorSname ? 'has-error' : '' ?>">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-user"></i>
                            </span>
                            <?= form_input('sname', set_value('sname'), 'class="form-control" placeholder="Отчество"')?>
                        </div>
                        <?= $errorSname; ?>
                    </div>

                    <?php $errorEmail = form_error("email", "<p class='text-danger'>", '</p>'); ?>
                    <div class="form-group <?= $errorEmail ? 'has-error' : '' ?>">
                        <label for="password">Электронная почта</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-envelope"></i>
                            </span>
                            <?= form_input('email', set_value('email'), 'class="form-control" placeholder="E-mail"')?>
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
                            <?= form_input('phone', set_value('phone'), 'class="form-control" placeholder="Телефон"')?>
                        </div>
                        <?= $errorPhone ?>
                    </div>

                    <?php $errorUsername = form_error("username", "<p class='text-danger'>", '</p>'); ?>
                    <div class="form-group <?= $errorUsername ? 'has-error' : '' ?>">
                        <label for="password">Логин</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-user"></i>
                            </span>
                            <?= form_input('username', set_value('username'), 'class="form-control" placeholder="Логин"')?>
                        </div>
                        <?= $errorUsername ?>
                    </div>

                    <?php $errorPass = form_error("password", "<p class='text-danger'>", '</p>'); ?>
                    <div class="form-group <?php echo $errorPass ? 'has-error' : '' ?>">
                        <label for="password">Пароль</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-lock"></i>
                            </span>
                            <?= form_password('password', '', 'placeholder="Пароль" class="form-control"')?>
                        </div>
                        <?= $errorPass ?>
                    </div>

                    <?php $errorConfirm = form_error("password_confirm", "<p class='text-danger'>", '</p>'); ?>
                    <div class="form-group <?php echo $errorConfirm ? 'has-error' : '' ?>">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-lock"></i>
                            </span>
                            <?= form_password('password_confirm', '', 'placeholder="Подтвердить пароль" class="form-control"')?>
                        </div>
                        <?= $errorConfirm ?>
                    </div>
                    <?= form_submit('submit', 'Зарегистрироваться', 'class="btn btn-primary"')?>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>