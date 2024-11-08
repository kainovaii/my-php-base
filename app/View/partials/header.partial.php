<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Mon Blog</a>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="/">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/blog">Blog</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/users">Users</a>
            </li>
            <?php if (loggedUser()->isLogged()) { ?>
            <li class="nav-item">
                <a class="nav-link" href="/users/account">Account</a>
            </li>
            <?php } else { ?>
            <li class="nav-item">
                <a class="nav-link" href="/users/login">Connexion</a>
            </li>
            <?php } ?>
        </ul>
        </div>
    </div>
</nav>