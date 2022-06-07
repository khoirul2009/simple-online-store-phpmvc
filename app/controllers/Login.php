<?php


class Login extends Controller
{

    public function index()
    {
        if (isset($_SESSION['login'])) return header('location: ' . BASEURL);
        $data = [
            'title' => 'Login'
        ];
        $this->view('layouts/header', $data);
        $this->view('layouts/navbar');
        $this->view('login/index');
        $this->view('layouts/footer');
    }
    public function attemptLogin()
    {
        if (isset($_SESSION['login'])) return header('location: ' . BASEURL);
        if (!$_POST) {
            header('location: ' . BASEURL . '/register');
        }
        $data = $this->model('User_model')->getEmail($_POST['email']);

        if (!$data) {
            Flasher::setFlash('message', 'Login failed please check your credential', 'danger');
            header('location: ' . BASEURL . ' login');
            exit;
        }
        if (!password_verify($_POST['password'], $data['password'])) {
            Flasher::setFlash('message', 'Login failed please check your credential', 'danger');
            header('location: ' . BASEURL . ' login');
            exit;
        }

        $_SESSION['login'] = [
            'user'  => $data['email'],
            'role'  => $data['role']
        ];

        return header('location: ' . BASEURL . ' dashboard');
    }
    public function logout()
    {
        if (!isset($_SESSION['login'])) return header('location: ' . BASEURL . 'login');

        unset($_SESSION['login']);

        header('location: ' . BASEURL . 'login');
    }
}
