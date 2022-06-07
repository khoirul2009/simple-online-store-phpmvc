<div class="container-fluid">
    <div class="row">


        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <div class="position-sticky pt-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link <?= ($_GET['url'] == 'dashboard' ? 'active' : ''); ?>" aria-current="page" href="<?= BASEURL; ?>dashboard">
                            <span data-feather="home" class="align-text-bottom"></span>
                            Dashboard

                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($_GET['url'] == 'dashboard/orders' ? 'active' : ''); ?>" href="<?= BASEURL; ?>dashboard/orders">
                            <span data-feather="file" class="align-text-bottom"></span>
                            Orders
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($_GET['url'] == 'dashboard/products' ? 'active' : ''); ?>" href="<?= BASEURL; ?>dashboard/products">
                            <span data-feather="shopping-cart" class="align-text-bottom"></span>
                            Products
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($_GET['url'] == 'dashboard/users' ? 'active' : ''); ?>" href="<?= BASEURL; ?>dashboard/users">
                            <span data-feather="users" class="align-text-bottom"></span>
                            Customers
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="bar-chart-2" class="align-text-bottom"></span>
                            Reports
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($_GET['url'] == 'dashboard/categories' ? 'active' : ''); ?>" href="<?= BASEURL; ?>dashboard/categories">
                            <span data-feather="layers" class="align-text-bottom"></span>
                            Categories
                        </a>
                    </li>
                </ul>


            </div>
        </nav>