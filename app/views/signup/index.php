<h2>Cadastre-se</h2>

<form action="signup/store" method="post">
    <input type="text" name="name" placeholder="Informe seu nome" value="<?php echo old('name');?>">
    <?php echo flashMessage('name'); ?>

    <input type="text" name="username" placeholder="Informe seu username" value="<?php echo old('username');?>">
    <?php echo flashMessage('username'); ?>

    <input type="password" name="password" placeholder="Informe sua senha" value="<?php echo old('password');?>">
    <?php echo flashMessage('password'); ?>

    <input type="password" name="passworConfirmation" placeholder="repita sua senha" value="<?php echo old('passworConfirmation');?>">
    <?php echo flashMessage('password'); ?>
    <?php echo "<p>". flashMessage('passwordErrorMatch') . "</p>"; ?>

    <button type="submit">Signup</button>

    <?php echo "<p>". flashMessage('userExists') . "</p>"; ?>

</form>