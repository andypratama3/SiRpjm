<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        return view('dashboard.role.index');
    }

    public function create()
    {
        return view('dashboard.role.create');
    }


}
