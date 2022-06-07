<?php


class Orders extends Controller
{
    public function __construct()
    {
        if (!isset($_SESSION['login'])) return header('location: ' . BASEURL . 'login');
        if (isset($_SESSION['login'])) $this->dataUser = $this->model('User_model')->getEmail($_SESSION['login']['user']);
    }
    public function index()
    {
        $data = [
            'title' => 'Orders',
            'transaksi' => $this->model('Transaksi_model')->getTransaksiByIdUsers($this->dataUser['id'])

        ];
        $this->view('layouts/header', $data);
        $this->view('layouts/navbar');
        $this->view('orders/index', $data);
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
        $this->view('layouts/navbar');
        $this->view('orders/detailOrder', $data);
        $this->view('layouts/footer');
    }
    public function prosesOrder()
    {
        if (!$_POST) {
            return header('location: ' . $_SERVER['HTTP_REFERER']);
        }
        $kirimOrder = $this->model('Transaksi_model')->terimaOrder($_POST);
        if ($kirimOrder > 0) {
            Flasher::setFlash('message', 'Pesanan Telah diterima', 'success');
            return header('location: ' . $_SERVER['HTTP_REFERER']);
        }
    }
}
