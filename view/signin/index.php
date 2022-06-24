<? if ($_SESSION['no_user_found_with_this_email']): ?>
    <div class="alert alert-danger">Пользователя с такой почтной не найдено</div>
    <?= $_SESSION['no_user_found_with_this_email'] = false ?>
<? endif ?>


<? if ($_SESSION['email_or_password_is_incorrect']): ?>
    <div class="alert alert-danger">Не верно указана почта и/или пароль</div>
    <?= $_SESSION['email_or_password_is_incorrect'] = false ?>
<? endif ?>

<form method="POST" action="/sign-in/upload">

    <input type="hidden" name="token" value="<?= $values['token']; ?>">

    <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" class="form-control" name="email" id="email">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="password" id="password">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>