<?php

namespace App\Http\Controllers\Masyarakat;

use App\Http\Controllers\Controller;
use App\Models\Berkas;
use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $laporan = Laporan::all();
        return view('menu.admin.daftarLaporan', ['laporan' => $laporan]);
    }

    public function indexLap()
    {
        $laporan = Laporan::with('user')->where('id_user', auth()->user()->id)->get();
        return view('menu.masyarakat.laporan', ['laporan' => $laporan]);
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
        // return $request->file('gambar');
        if ($request->file('gambar')) {
            $img_name = $request->file('gambar')->store('gambar', 'public');
        }
        Laporan::create([
            'id_user' => auth()->user()->id,
            'judul' => $request->judul,
            'isi' => $request->isi,
            'gambar' => $img_name
        ]);

        return redirect()->route('laporan-masyarakat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lapor = Laporan::with('user')->where('id_user', $id)->get();
        return view('menu.masyarakat.laporan', ['lapor' => $lapor]);
    }

    public function showLapor($id)
    {
        $lapor = Laporan::with('user')->where('id_user', $id)->get();
        return view('menu.admin.laporan', ['lapor' => $lapor]);
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
        // return $id;
        $lapor = Laporan::find($id);
        $img = $lapor->gambar;
        // return $img;

        if ($lapor->gambar != null && $request->file != null) {
            Storage::delete('storage/' . $lapor->gambar);
            $img = $request->file('gambar')->store('gambar', 'public');
        }

        $lapor->judul = $request->judul;
        $lapor->isi = $request->isi;
        $lapor->gambar = $img;
        $lapor->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Laporan::find($id)->delete();
        return redirect()->back();

    }

    public function ubahStatus(Request $request)
    {
        $lapor = Laporan::find($request->id);
        $lapor->status = $request->status;
        $lapor->save();
    }
}
