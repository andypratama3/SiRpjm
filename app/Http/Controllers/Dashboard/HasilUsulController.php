<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Usul;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HasilUsulController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:hasil-index|hasil-create|hasil-edit|hasil-delete', ['only' => ['index']]);
        $this->middleware('permission:hasil-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:hasil-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:hasil-delete', ['only' => ['destroy']]);
        $this->middleware('permission:hasil-status', ['only' => ['status']]);
    }

    public function index()
    {
        $limit = 10;

        $usuls = Usul::select('id','name', 'lokasi', 'volume', 'satuan','status','user_id','biaya','tahun_prioritas')->where('status', '!=', 'menunggu');
        if(Auth::user()->hasAnyRole(['panitia', 'pemdes'])){


        }else{
            $usuls = $usuls->where('user_id', Auth::user()->id);
        }

        $usuls = $usuls->paginate($limit);
        $no = $limit * ($usuls->currentPage() - 1);
        return view('dashboard.hasil-usul.index', compact('usuls', 'no'));
    }

    public function show($id)
    {
        $usul = Usul::find($id);
        return view('dashboard.hasil-usul.show', compact('usul'));
    }



    public function destroy($id)
    {
        $usul = Usul::find($id);
        $usul->delete();
        flash()->success('Hasil Usul Berhasil Di Hapus.');
        return redirect()->route('dashboard.hasil.usul.index');
    }
}
