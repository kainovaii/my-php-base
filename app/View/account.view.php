<h3>Account</h3>
<li>Username: <?= $_SESSION['user']->username; ?></li>
<li>Email: <?= $_SESSION['user']->email; ?></li>
<li><a href="/api/users/logout">Logout</a></li>