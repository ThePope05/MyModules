<?php

class User extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'User'
        ];

        $this->view('User/index', $data);
    }

    public function loginPage()
    {
        $data = [
            'title' => 'Login',
            'info' => [
                'email' => '',
            ],
            'error' => [
                'email' => '',
                'password' => '',
            ],
        ];

        $this->view('User/login', $data);
    }

    public function login()
    {
        $data = [
            'title' => 'Login',
            'info' => [
                'email' => $_POST['email'],
            ],
            'error' => [
                'email' => '',
                'password' => '',
            ],
        ];

        if (empty($data['info']['email'])) {
            $data['error']['email'] = 'Email is required';
        }

        if (empty($_POST['password'])) {
            $data['error']['password'] = 'Password is required';
        }

        if (empty($data['error']['email']) && empty($data['error']['password'])) {
            $user = $this->model('UserModel')->getUserByEmail($data['info']['email']);

            if ($user) {
                if (password_verify($_POST['password'], $user['password'])) {
                    $_SESSION['user_id'] = $user;
                    exit;
                } else {
                    $data['error']['password'] = 'Password is wrong';
                }
            } else {
                $data['error']['email'] = 'Email is not registered';
            }
        }
    }

    public function signUpPage()
    {
        $data = [
            'title' => 'Sign Up',
            'info' => [
                'name' => '',
                'email' => '',
            ],
            'error' => [
                'name' => '',
                'email' => '',
                'password' => '',
                're_password' => '',
            ],
        ];

        $this->view('User/signup', $data);
    }

    public function signUp()
    {
        $data = [
            'title' => 'Sign Up',
            'info' => [
                'name' => $_POST['name'],
                'email' => $_POST['email'],
            ],
            'error' => [
                'name' => '',
                'email' => '',
                'password' => '',
                're_password' => '',
            ],
        ];

        if (empty($data['info']['name'])) {
            $data['error']['name'] = 'Name is required';
        }

        if (empty($data['info']['email'])) {
            $data['error']['email'] = 'Email is required';
        }

        if (empty($_POST['password'])) {
            $data['error']['password'] = 'Password is required';
        }

        if (empty($_POST['re_password'])) {
            $data['error']['re_password'] = 'Password is required';
        }

        if (empty($data['error']['name']) && empty($data['error']['email']) && empty($data['error']['password']) && empty($data['error']['re_password'])) {
            $user = $this->model('UserModel')->getUserByEmail($data['info']['email']);

            if ($user) {
                $data['error']['email'] = 'Email is already registered';
            } else {
                if ($_POST['password'] != $_POST['re_password']) {
                    $data['error']['re_password'] = 'Passwords do not match';
                } else {
                    $data['info']['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
                    $this->model('UserModel')->storeUser($data['info']);

                    $this->login();
                }
            }
        }
    }
}
