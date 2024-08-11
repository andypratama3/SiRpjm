<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Usul;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class UsulController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:mengusulkan-index|mengusulkan-create|mengusulkan-edit|mengusulkan-delete', ['only' => ['index']]);
        $this->middleware('permission:mengusulkan-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:mengusulkan-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:mengusulkan-delete', ['only' => ['destroy']]);
        $this->middleware('permission:mengusulkan-status', ['only' => ['status']]);
    }

    public function index()
    {
        $limit = 10;

        $usuls = Usul::select('id','name', 'lokasi', 'volume', 'satuan','status','user_id')->where('status','!=' ,'DiTerima');
        if(Auth::user()->hasRole('panitia')){

        }else{
            $usuls = $usuls->where('user_id', Auth::user()->id);
        }

        $usuls = $usuls->paginate($limit);
        $no = $limit * ($usuls->currentPage() - 1);
        return view('dashboard.usul.index', compact('usuls', 'no'));
    }

    public function create()
    {
        return view('dashboard.usul.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'volume' => 'required|string|max:255',
            'satuan' => 'required|string|max:255',
        ]);

        $usul = Usul::create(
            [
                'name' => $request->name,
                'lokasi' => $request->lokasi,
                'volume' => $request->volume,
                'satuan' => $request->satuan,
                'user_id' => Auth::user()->id
            ]
        );
        flash()->success('Usul Berhasil Tambah.');

        return redirect()->route('dashboard.usul.index');
    }

    public function show(Usul $usul)
    {
        return view('dashboard.usul.show', compact('usul'));
    }

    public function edit(Usul $usul)
    {
        return view('dashboard.usul.edit', compact('usul'));
    }

    public function update(Request $request, Usul $usul)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'volume' => 'required|string|max:255',
            'satuan' => 'required|string|max:255',
        ]);


        $usul->update(
            [
                'name' => $request->name,
                'lokasi' => $request->lokasi,
                'volume' => $request->volume,
                'satuan' => $request->satuan,
                'status' => $request->status,
            ]
        );
        flash()->success('Usul Berhasil Hapus.');
        return redirect()->route('dashboard.usul.index');
    }

    public function destroy(Usul $usul)
    {
        $usul->delete();
        flash()->success('Usul Berhasil Di Hapus.');
        return redirect()->route('dashboard.usul.index');
    }

    public function status (Usul $usul)
    {

        if($usul->status == 'Diterima'){
            $usul->update(['status' => 'Ditolak']);
            flash()->success('Usul Berhasil Di Tolak.');
            return redirect()->route('dashboard.usul.index');
        }else{
            $usul->update(['status' => 'Diterima']);
            flash()->success('Usul Berhasil Di Setujui.');
            return redirect()->route('dashboard.usul.index');
        }
        return redirect()->route('dashboard.usul.index');
    }
}
