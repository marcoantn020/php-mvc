<h1>Login</h1>

<form action="/login/store" method="post">
    <input type="text" name="username" value="marco" placeholder="Digite seu username">
    <input type="password" name="password" value="marco" placeholder="Digite sua senha">
    <button type="submit">Logar</button>
    <?php echo flashMessage('login'); ?>

</form>
