<?php

class Auth extends Controller
{
    public function sign_in()
    {
        $data['title'] = 'Sign in';
        $this->view('auth/sign-in', $data);
    }

    public function sign_up()
    {
        $data['title'] = 'Sign up';
        $this->view('auth/sign-up', $data);
    }

    // register
    public function register()
    {
        // cek user
        if ($this->model('Auth_model')->getUserByEmail($_POST['email']) > 0) {
            Flasher::setFlash('Gagal', 'User sudah ada!', 'danger');
            header('Location: ' . BASE_URL . '/auth/sign_up');
        }
        if ($this->model('Auth_model')->register($_POST) > 0) {
            Flasher::setFlash('Berhasil', 'User baru berhasil ditambahkan!', 'success');
            header('Location: ' . BASE_URL . '/auth/sign_in');
        } else {
            Flasher::setFlash('Gagal', 'User baru gagal ditambahkan!', 'danger');
            header('Location: ' . BASE_URL . '/auth/sign_up');
        }
    }

    // login
    public function login()
    {
        $result = $this->model('Auth_model')->login($_POST);
        if ($result['role_id'] == 1) {
            $_SESSION['account'] = $result['data'];
            header('Location: ' . BASE_URL . '/po_dashboard');
        } else if ($result['role_id'] == 2) {
            $_SESSION['account'] = $result['data'];
            header('Location: ' . BASE_URL . '/dashboard');
        } else {
            Flasher::setFlash('Gagal', 'Email atau password salah!', 'danger');
            header('Location: ' . BASE_URL . '/auth/sign_in');
        }
    }

    public function logout()
    {
        unset($_SESSION['account']);
        session_destroy();
        Flasher::setFlash('Berhasil', 'Anda berhasil log out', 'success');
        header('Location: ' . BASE_URL . '/auth/sign_in');
    }
}
