<?php


class Dashboard extends Controller
{
    public function __construct()
    {
        if (!isset($_SESSION['login'])) return header('location: ' . BASEURL . 'login');
        if ($_SESSION['login']['role'] != 'admin') return header('location: ' . BASEURL . 'login');
    }
    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'countUser' => count($this->model('User_model')->getUsers()),
            'countProducts' => count($this->model('Product_model')->getProducts()),
            'countOrders' => count($this->model('Transaksi_model')->getTransaksi()),
            'countCategories' => count($this->model('Category_model')->getCategory()),
            'countStock' => $this->model('Product_model')->getStock()
        ];
        $this->view('layouts/header', $data);
        $this->view('layouts/header_dashboard');
        $this->view('layouts/sidebar');
        $this->view('dashboard/index', $data);
        $this->view('layouts/footer');
    }
    public function categories()
    {
        $data = [
            'title' => 'Dashboard | Categories',
            'categories' => $this->model('Category_model')->getCategory()
        ];
        $this->view('layouts/header', $data);
        $this->view('layouts/header_dashboard');
        $this->view('layouts/sidebar');
        $this->view('dashboard/kategori', $data);
        $this->view('layouts/footer');
    }
    public function products()
    {
        $data = [
            'title' => 'Dashboard | Products',
            'products' => $this->model('Product_model')->getProducts()
        ];
        $this->view('layouts/header', $data);
        $this->view('layouts/header_dashboard');
        $this->view('layouts/sidebar');
        $this->view('dashboard/products', $data);
        $this->view('layouts/footer');
    }
    public function users()
    {
        $data = [
            'title' => 'Dashboard | Users',
            'users' => $this->model('User_model')->getUsers()
        ];
        $this->view('layouts/header', $data);
        $this->view('layouts/header_dashboard');
        $this->view('layouts/sidebar');
        $this->view('dashboard/users', $data);
        $this->view('layouts/footer');
    }
    public function deleteUser()
    {
        if (!$_POST) return header('location: ' . BASEURL . 'dashboard/addproduct');
        $delete = $this->model('User_model')->delete($_POST);
        if ($delete > 0) {
            Flasher::setFlash('message', 'User success added', 'success');
            return header('location: ' . BASEURL . 'dashboard/users');
        }
    }

    public function addProduct()
    {
        $data = [
            'title' => 'Dashboard | Add Products',
            'category' => $this->model('Category_model')->getCategory()
        ];

        $this->view('layouts/header', $data);
        $this->view('layouts/header_dashboard');
        $this->view('layouts/sidebar');
        $this->view('dashboard/addProducts', $data);
        $this->view('layouts/footer');
    }
    public function saveProduct()
    {


        if (!$_POST) return header('location: ' . BASEURL . 'dashboard/addproduct');

        $saveProduct = $this->model('Product_model')->save($_POST, $_FILES['gambar']);

        if ($saveProduct > 0) {
            Flasher::setFlash('message', 'Product success added', 'success');
            return header('location: ' . BASEURL . 'dashboard/products');
        }
        Flasher::setFlash('message', 'Product fail add', 'danger');
        return header('location: ' . BASEURL . 'dashboard/addproduct');
    }
    public function deleteProduct()
    {
        if (!$_POST) return header('location: ' . BASEURL . 'dashboard/products');
        $delete = $this->model('Product_model')->delete($_POST);


        if ($delete > 0) {
            Flasher::setFlash('message', 'Product success deleted', 'success');
            return header('location: ' . BASEURL . 'dashboard/products');
        }
    }
    public function detailProduct($id)
    {
        $product = $this->model('Product_model')->getProducts($id);
        $data = [
            'title' => 'Detail Product',
            'product' => $product
        ];
        $this->view('layouts/header', $data);
        $this->view('layouts/header_dashboard');
        $this->view('layouts/sidebar');
        $this->view('dashboard/detailProduct', $data);
        $this->view('layouts/footer');
    }
    public function editProduct($id)
    {
        $data = [
            'title' => 'Dashboard | Edit Product',
            'product' => $this->model('Product_model')->getProducts($id),
            'category' => $this->model('Category_model')->getCategory()
        ];

        $this->view('layouts/header', $data);
        $this->view('layouts/header_dashboard');
        $this->view('layouts/sidebar');
        $this->view('dashboard/editProduct', $data);
        $this->view('layouts/footer');
    }
    public function updateProduct()
    {
        if (!$_POST) return header('location: ' . BASEURL . 'dashboard/products');
        if ($_FILES['gambar']['error'] === 4) {
            $this->model('Product_model')->update($_POST);
            Flasher::setFlash('message', 'Product success edited', 'success');
            return header('location: ' . BASEURL . 'dashboard/editproduct/' . $_POST['id']);
        }
        $this->model('Product_model')->update($_POST, $_FILES['gambar']);
        Flasher::setFlash('message', 'Product success edited', 'success');
        return header('location: ' . BASEURL . 'dashboard/editproduct/' . $_POST['id']);
    }
    public function orders()
    {
        $data = [
            'title' => 'Dashboard | Detail Orders',
            'orders' => $this->model('Transaksi_model')->getTransaksi()
        ];

        $this->view('layouts/header', $data);
        $this->view('layouts/header_dashboard');
        $this->view('layouts/sidebar');
        $this->view('dashboard/orders', $data);
        $this->view('layouts/footer');
    }
    public function detailOrder($id)
    {
        $detailOrder = $this->model('Transaksi_model')->getTransaksi($id);
        $data = [
            'title' => 'Dashboard | Detail Orders',
            'detailOrder' => $detailOrder,
            'products' => $this->model('Order_model')->getProducts($detailOrder['kode_transaksi'])
        ];

        $this->view('layouts/header', $data);
        $this->view('layouts/header_dashboard');
        $this->view('layouts/sidebar');
        $this->view('dashboard/detailOrder', $data);
        $this->view('layouts/footer');
    }
    public function prosesOrder()
    {
        if (!$_POST) {
            return header('location: ' . $_SERVER['HTTP_REFERER']);
        }
        $kirimOrder = $this->model('Transaksi_model')->kirimOrder($_POST);
        if ($kirimOrder > 0) {
            Flasher::setFlash('message', 'Pesanan telah dikirm', 'success');
            return header('location: ' . $_SERVER['HTTP_REFERER']);
        }
    }
}
