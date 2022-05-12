<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perjalanan;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class PerjalananController extends Controller
{

    public function __construct()
    {
        $this->middleware('authcek');    
    }

    public function index(){

        if (auth()->user()) {
            $data = DB::table('perjalanan')
                ->join('users', 'users.id', '=', 'perjalanan.id_user')
                ->select('perjalanan.id', 'perjalanan.lokasi', 'perjalanan.tanggal', 'perjalanan.jam', 'perjalanan.suhu')
                ->where('users.id', '=', auth()->user()->id)
                ->paginate(10);

            return view('pages.dashboard', ['data' => $data]);
        }

        return view('pages.dashboard');

    }

    public function showInputForm(){
        return view('pages.form');
    }

    public function inputData(Request $request){

        $request->validate([
            'tanggal' => 'required',
            'jam' => 'required',
            'suhu' => 'required',
            'lokasi' => 'required'
        ],[

            'tanggal.required' => 'Tanggal tidak boleh kosong',
            'jam.required' => 'Jam tidak boleh kosong',
            'suhu.required' => 'Suhu tidak boleh kosong',
            'lokasi.required' => 'Lokasi tidak boleh kosong',
        ]);

        $data = [
            'id_user' => auth()->user()->id,
            'tanggal' => $request->tanggal,
            'jam' => $request->jam,
            'suhu' => $request->suhu,
            'lokasi' => $request->lokasi
        ];

        Perjalanan::create($data);

        return redirect('/dashboard')->with('success', 'Data berhasil ditambahkan');
    }

    public function search(Request $request)
    {
        if (!empty($request->input('lokasi')) && empty($request->input('suhu')) && empty($request->input('tanggal')) && empty($request->input('jam'))) {
            $cari = $request->lokasi;
            $data = User::join('perjalanan', 'perjalanan.id_user', '=', 'users.id')
                ->where(function ($query) use ($cari) {
                    $query->where('users.name', auth()->user()->name)
                        ->where('perjalanan.lokasi', 'LIKE', '%' . $cari . '%');
                })->paginate(10, ['users.name', 'perjalanan.*']);
            if ($data) {
                return view('pages.dashboard', ['data' => $data])->with('search-success', 'data ditemukan');
            } else {
                abort(404);
            }
        } elseif (empty($request->input('lokasi')) && !empty($request->input('suhu')) && empty($request->input('tanggal')) && empty($request->input('jam'))) {
            $cari = $request->suhu;
            $data = User::join('perjalanan', 'perjalanan.id_user', '=', 'users.id')
                ->where(function ($query) use ($cari) {
                    $query->where('users.name', auth()->user()->name)
                        ->where('perjalanan.suhu', 'LIKE', '%' . $cari . '%');
                })->paginate(10, ['users.name', 'perjalanan.*']);
            if ($data) {
                return view('pages.dashboard', ['data' => $data])->with('search-success', 'data ditemukan');
            } else {
                abort(404);
            }
        } elseif (empty($request->input('lokasi')) && empty($request->input('suhu')) && !empty($request->input('tanggal')) && empty($request->input('jam'))) {
            $cari = $request->tanggal;
            $data = User::join('perjalanan', 'perjalanan.id_user', '=', 'users.id')
                ->where(function ($query) use ($cari) {
                    $query->where('users.name', auth()->user()->name)
                        ->where('perjalanan.tanggal', 'LIKE', '%' . $cari . '%');
                })->paginate(10, ['users.name', 'perjalanan.*']);
            if ($data) {
                return view('pages.dashboard', ['data' => $data])->with('search-success', 'data ditemukan');
            } else {
                abort(404);
            }
        } elseif (empty($request->input('lokasi')) && empty($request->input('suhu')) && empty($request->input('tanggal')) && !empty($request->input('jam'))) {
            $cari = $request->jam;
            $data = User::join('perjalanan', 'perjalanan.id_user', '=', 'users.id')
                ->where(function ($query) use ($cari) {
                    $query->where('users.name', auth()->user()->name)
                        ->where('perjalanan.jam', 'LIKE', '%' . $cari . '%');
                })->paginate(10, ['users.name', 'perjalanan.*']);
            if ($data) {
                return view('pages.dashboard', ['data' => $data])->with('search-success', 'data ditemukan');
            } else {
                abort(404);
            }
        } else {
            $data = DB::table('perjalanan')
            ->join('users', 'users.id', '=', 'perjalanan.id_user')
            ->select('users.name', 'perjalanan.tanggal', 'perjalanan.jam', 'perjalanan.suhu', 'perjalanan.lokasi')
            ->where('users.id', '=', auth()->user()->id)
            ->paginate(10);
            return view('pages.dashboard', ['data' => $data]);
        }
    }

    public function delete($id){
        $data = Perjalanan::find($id);
        $data->delete();
        return redirect('/dashboard')->with('success', 'Data berhasil dihapus');
    }

    public function edit($id){
        $data = Perjalanan::find($id);
        
        if(auth()->user()->id == $data->id_user){
            return view('pages.edit', ['data' => $data]);
        }

        return abort(404);
    }

    public function update(Request $request, $id) {
        $data = Perjalanan::find($id);

        if(auth()->user()->id == $data->id_user){
            
            $request->validate([
                'tanggal' => 'required',
                'jam' => 'required',
                'suhu' => 'required',
                'lokasi' => 'required'
            ],[
    
                'tanggal.required' => 'Tanggal tidak boleh kosong',
                'jam.required' => 'Jam tidak boleh kosong',
                'suhu.required' => 'Suhu tidak boleh kosong',
                'lokasi.required' => 'Lokasi tidak boleh kosong',
            ]);

            $data->update($request->all());
            return redirect('/dashboard')->with('success', 'Data berhasil diupdate');
        }

        return abort(404);
    }

}
