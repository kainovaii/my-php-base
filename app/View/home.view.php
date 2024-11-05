<h1>Hello world</h1>

<table>
<tr>
    <th>Username</th>
    <th>Email</th>
    <th>Role</th>
</tr>
<?php foreach ($users as $user) { ?>
<tr>
    <td><?= $user->username ?></td>
    <td><?= $user->email ?></td>
    <td><?= $user->role ?></td>
</tr>
<?php } ?>
</table>

<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}
</style>