<?php

namespace App\Http\Controllers;


class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'isAdmin']);
    }

    
    public function index()
    {
        return view('admin.index');
    }
}
