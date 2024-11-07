<?php use Core\Http\Service\Service ?>
<h3>Account</h3>
<li>Username: <?= Service::get()->loggedUser->getUser()->username; ?></li>
<li>Email: <?= Service::get()->loggedUser->getUser()->email; ?></li>
<li><a href="/api/users/logout">Logout</a></li>