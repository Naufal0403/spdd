<?php

namespace App\Http\Controllers;

use App\Models\Keuangan;
use Illuminate\Http\Request;

class KeuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $uang = Keuangan::with('user')->where('id_user', auth()->user()->id)->get();
        return view('menu.masyarakat.keuangan.rincian', ['uang' => $uang]);
    }

    public function indexUser()
    {
        $uang = Keuangan::all();
        return view('menu.admin.rincian', ['uang' => $uang]);
    }

    public function showUser($id)
    {
        $uang = Keuangan::with('user')->where('id_user', $id)->get();
        return view('menu.admin.rincian', ['uang' => $uang]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return auth()->user()->id;
        Keuangan::create([
            'id_user' => auth()->user()->id,
            'tanggal' => $request->tanggal,
            'pemasukan' => $request->pemasukan,
            'pengeluaran' => $request->pengeluaran,
            'keterangan' => $request->keterangan
        ]);

        return redirect()->route('keuangan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $keuangan = Keuangan::find($id);
        $keuangan->tanggal = $request->tanggal;
        $keuangan->pemasukan = $request->pemasukan;
        $keuangan->pengeluaran = $request->pengeluaran;
        $keuangan->keterangan = $request->keterangan;
        $keuangan->save();

        return redirect()->route('keuangan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Keuangan::find($id)->delete();

        return redirect()->route('keuangan.index');
    }
}
