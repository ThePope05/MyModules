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
}
