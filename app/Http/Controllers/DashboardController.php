<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function articlePage()
    {
        return view('admin.pages.article.index');
    }
}
