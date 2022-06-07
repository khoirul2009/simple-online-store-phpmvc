<?php


class Home extends Controller
{

    public function index()
    {
        $data = [
            'title' => 'Home',
            'products' => $this->model('Product_model')->getProducts()
        ];
        $this->view('layouts/header', $data);
        $this->view('layouts/navbar');
        $this->view('home/index', $data);
        $this->view('layouts/footer');
    }
    public function detailProduct($id)
    {
        $product = $this->model('Product_model')->getProducts($id);
        $data = [
            'title' => 'Detail Product',
            'product' => $product
        ];
        $this->view('layouts/header', $data);
        $this->view('layouts/navbar');
        $this->view('home/detailProduct', $data);
        $this->view('layouts/footer');
    }
}
