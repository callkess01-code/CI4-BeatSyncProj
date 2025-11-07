<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Users extends BaseController
{
    public function index(): string
    {
        return view('user/landing');
    }
    public function login(): string
    {
        return view('user/login');
    }
    public function signup(): string
    {
        return view('user/signup');
    }
    public function moodboard(): string
    {
        return view('user/moodboard');
    }
    public function roadmap(): string
    {
        return view('user/roadmap');
    }
    public function dashboard(): string
    {
        return view('admin/dashboard');
    }
    public function services(): string
    {
        return view('admin/services');
    }
    public function accounts(): string
    {
        return view('admin/accounts');
    }
    public function request(): string
    {
        return view('admin/request');
    }
}
