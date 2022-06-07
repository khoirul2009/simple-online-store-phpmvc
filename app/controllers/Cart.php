<?php


class Cart extends Controller
{
    protected $dataUser;
    public function __construct()
    {
        if (!isset($_SESSION['login'])) return header('location: ' . BASEURL . 'login');
        if (isset($_SESSION['login'])) $this->dataUser = $this->model('User_model')->getEmail($_SESSION['login']['user']);
    }
    public function index()
    {
        $data = [
            'title' => 'Home',
            'carts' => $this->model('Order_model')->getCarts($this->dataUser['id'])
        ];
        $this->view('layouts/header', $data);
        $this->view('layouts/navbar');
        $this->view('cart/index', $data);
        $this->view('layouts/footer');
    }

    public function addToCart()
    {

        $data = [
            'id_user' => $this->dataUser['id'],
            'id_product' => $_POST['id_product'],
        ];
        $addToCart = $this->model('Order_model')->addToCart($data);
        if ($addToCart > 0) {
            Flasher::setFlash('message', 'Product added to cart', 'success');
            return header('location: ' . BASEURL . 'cart');
        }
    }
    public function deleteFromCart()
    {
        if (!$_POST) return header('location: ' . $_SERVER['HTTP_REFERER']);
        $deleteCart = $this->model('Order_model')->deleteCart($_POST);
        if ($deleteCart > 0) {
            Flasher::setFlash('message', 'Cart success deleted', 'success');
            return header('location: ' . BASEURL . 'cart');
        }
    }
    public function checkout()
    {
        $carts = $this->model('Order_model')->getCarts($this->dataUser['id']);
        if (count($carts) == 0) {
            Flasher::setFlash('message', 'Cart masih kosong silahkan berbelanja', 'danger');
            return header('location: ' . BASEURL . 'cart');
        }
        $data = [
            'title' => 'Home',
            'carts' => $carts
        ];
        $this->view('layouts/header', $data);
        $this->view('layouts/navbar');
        $this->view('cart/checkout', $data);
        $this->view('layouts/footer');
    }
    public function order()
    {
        if (!$_POST) return header('location: ' . BASEURL . 'cart');
        $_POST['kode'] =  'TRX' . date('d-m-Y') . time();

        $insertOrder = $this->model('Transaksi_model')->insertTransaksi($_POST, $this->dataUser['id']);
        $orderCart = $this->model('Order_model')->orderCart($_POST['kode'], $this->dataUser['id']);
        $getProductsOrder = $this->model('Order_model')->getProductsOrder($_POST['kode'], $this->dataUser['id']);
        for ($i = 0; $i < count($getProductsOrder); $i++) {
            $updateStock = $this->model('Product_model')->updateStock($getProductsOrder[$i]);
        }
        if (($insertOrder > 0) and ($orderCart > 0)) {
            Flasher::setFlash('message', 'Product added to orders', 'success');
            return header('location: ' . BASEURL . 'orders');
        }
    }
}
