<?php

namespace App\Http\Controllers;

use App\Models\NhapKho;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function index()
    {
        return view('client.shares.master');
    }
    public function login()
    {
        return view('client.pages.login');
    }
    public function checkout()
    {
        return view('client.pages.checkout');
    }
}
