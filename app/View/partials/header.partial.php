<?php use Core\Http\Service\Service ?>
<div style="margin-bottom: 10px;">
    <ul>
    <li><a href="/">Home</a></li>
    <?php if (Service::get()->loggedUser->isLogged()) { ?>
    <li><a href="/users/account">Account</a></li>
    <?php } else { ?>
    <li><a href="/users/login">Connexion</a></li>
    <?php } ?>
    </ul>
</div>