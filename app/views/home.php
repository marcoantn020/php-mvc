<h1>Lista de usuarios <?php echo count($users); ?></h1>

<ul>
    <?php foreach ($users as $user):?>
        <li> <?php echo $user->id . " -> " . $user->name; ?> | <a href="/user/show/<?php echo $user->id;?>"> Ver usuario </a></li>
    <?php endforeach; ?>
</ul>