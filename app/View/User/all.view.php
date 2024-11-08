<div class="container mt-3">
    <h3>Show user</h3>
</div>
<?php foreach ($users as $user) { ?>
<div class="container mt-3">
    <li>Username: <?= $user->username ?></li>
    <li>Email: <?= $user->email ?></li>
    <li><a href="/users/<?= $user->username ?>">View</a></li>
</div>
<?php } ?>