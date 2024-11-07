<?php use Core\Http\Service\Service ?>
<h3>Account</h3>
<li>Username: <?= Service::get()->session->get('user')->username; ?></li>
<li>Email:  <?= Service::get()->session->get('user')->email; ?></li>
<li>Email:  <?= Service::get()->loggedUser->getUser()->email; ?></li>
<li><a href="/api/users/logout">Logout</a></li>