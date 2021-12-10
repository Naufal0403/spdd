<?php

namespace App\Http\Controllers\Masyarakat;

use App\Http\Controllers\Controller;
use App\Models\Berkas;
use App\Models\User;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;

class BerkasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $berkas = Berkas::all();
        return view('menu.admin.berkas', ['berkas' => $berkas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    public function buat($id)
    {
        $berkas = Berkas::with('user')->where('id_user', $id)->count();
        // return $berkas;
        // return $berkas;
        if ($berkas != 0) {
            return redirect()->back()->with('success', 'Anda sudah mendaftar Berkas');
        } else {
            return view('menu.masyarakat.daftarBerkas');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->file('fotoUsaha');
        if ($request->file('fotoUsaha') && $request->file('fotoKK')) {
            $img_usaha = $request->file('fotoUsaha')->store('gambar', 'public');
            $img_kk = $request->file('fotoKK')->store('gambar', 'public');
        }
        $user = auth()->user();
        if ($user->deadline == null) {
            User::create([
                'deadline' => date('Y-m-d')
            ]);
        }
        // return $user->deadline;
        // $user->deadline = strtotime("+4 month", $user->deadline);

        Berkas::create([
            'id_user' => $user->id,
            'name_lengkap' => $request->name_lengkap,
            'nik' => $request->nik,
            'nkk' => $request->nkk,
            'telepon' => $request->telepon,
            'umur' => $request->umur,
            'pesan' => $request->pesan,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'fotoUsaha' => $img_usaha,
            'fotoKK' => $img_kk
        ]);

        return redirect()->route('dashboard.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $berkas = Berkas::with('user')->where('id_user', $id);
        return $berkas;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function changeStatus(Request $request)
    {
        // return $request;
        $berkas = Berkas::find($request->id);
        // return $berkas;
        $berkas->status = $request->status;
        $berkas->save();
    }
}
