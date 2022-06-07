<?php



class Register extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Register'
        ];
        $this->view('layouts/header', $data);
        $this->view('layouts/navbar');
        $this->view('register/index');
        $this->view('layouts/footer');
    }
    public function attemptRegister()
    {
        if (!$_POST) {
            header('location: ' . BASEURL . '/register');
            exit;
        }
        if ($_POST['password'] !== $_POST['confPassword']) {
            Flasher::setFlash('message', 'Password and Confrim Password must matches', 'danger');
            header('location: ' . BASEURL . ' register');
            exit;
        }

        $email = $this->model('User_model')->getEmail($_POST['email']);

        if ($email) {
            Flasher::setFlash('message', 'Email already registered', 'danger');
            header('location: ' . BASEURL . ' register');
            exit;
        }
        $register = $this->model('User_model')->save($_POST);

        if ($register > 0) {

            Flasher::setFlash('message', 'Account has been created', 'success');
            header('location: ' . BASEURL . ' login');
        }
    }
}
