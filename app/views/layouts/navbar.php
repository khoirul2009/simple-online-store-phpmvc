<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand fw-semibold" href="<?= BASEURL; ?>">KA Shop</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <?php !isset($_GET['url']) ? $_GET['url'] = 'home' : '' ?>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link <?= $_GET['url'] == 'home' ? 'active' : ''; ?>" aria-current="page" href="<?= BASEURL; ?>home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $_GET['url'] == 'cart' ? 'active' : ''; ?>" href="<?= BASEURL; ?>cart">Cart</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  <?= $_GET['url'] == 'orders' ? 'active' : ''; ?>" href="<?= BASEURL; ?>orders">Orders</a>
                </li>
            </ul>
            <?php if (!isset($_SESSION['login'])) : ?>
                <div class="d-block ms-auto">
                    <a href="<?= BASEURL; ?>/login" class="btn btn-outline-success">Login</a>
                </div>
            <?php else : ?>
                <div class="d-block ms-auto">
                    <a href="<?= BASEURL; ?>login/logout" class="btn btn-outline-danger">Logout</a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</nav>
<br><br><br>