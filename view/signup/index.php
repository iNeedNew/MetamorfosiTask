<? if ($_SESSION['password_does_not_match_confirmation_password']): ?>
    <div class="alert alert-danger">Пароли не совпадают</div>
    <?= $_SESSION['password_does_not_match_confirmation_password'] = false ?>
<? endif ?>

<? if ($_SESSION['email_already_in_use']): ?>
    <div class="alert alert-danger">Почта используется</div>
    <?= $_SESSION['email_already_in_use'] = false ?>
<? endif ?>
<form method="POST" action="/sign-up/upload">

    <input type="hidden" name="token" value="<?= $values['token']; ?>">

    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" name="username" id="username">
    </div>
    <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" class="form-control" name="email" id="email">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="password" id="password">
    </div>
    <div class="form-group">
        <label for="password_confirmed">Password confirmed</label>
        <input type="password" class="form-control" name="password_confirmed" id="password_confirmed">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>