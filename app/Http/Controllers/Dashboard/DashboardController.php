<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Usul;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __invoke()
    {

        $usul = Usul::count();
        $hasil_usul = Usul::where('status', 'DiTerima')->count();
        return view('dashboard.index', compact('usul', 'hasil_usul'));
    }
}
