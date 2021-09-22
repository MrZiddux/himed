<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        return view('admin.pages.home.index');
    }

    public function articlePage()
    {
        return view('admin.pages.article.index');
    }
}
