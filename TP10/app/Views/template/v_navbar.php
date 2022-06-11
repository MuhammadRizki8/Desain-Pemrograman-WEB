<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">BOOKLIBRARY</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <ul class="navbar-nav">

                <!-- kalau menggunakan xampp, ubah "/" menjadi <?= base_url('/') ?> -->
                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/books">Book List</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="info" data-toggle="dropdown">
                        Info
                    </a>
                    <div class="dropdown-menu" aria-labelledby="info">
                        <a class="dropdown-item" href="/home/about">About</a>
                        <a class="dropdown-item" href="/home/contact">Contact</a>
                    </div>
                </li>
                <li class="nav-item">
                    <?php if(logged_in()): ?>
                        <a class="nav-link" href="/logout">Log out</a>
                    <?php else:?>
                        <a class="nav-link" href="/login">Log in</a>
                    <?php endif;?>
                </li>
            </ul>
        </div>
    </div>
    </div>
</nav>