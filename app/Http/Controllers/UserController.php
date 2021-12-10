<?php

namespace App\Http\Controllers;

use App\Models\Berkas;
use App\Models\Keuangan;
use App\Models\Laporan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        return view('menu.admin.user', ['user' => $user]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id)->get();
        return view('menu.admin.detailUser', ['user' => $user]);
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

    public function updateDeadline(Request $request)
    {
        $user = DB::table('users')->update(['deadline' => $request->deadline]);
        // return $user;
        // return $request;
        // $user = $request->deadline;
        // $user->save();

        return redirect()->route('user.index');
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
        return $id;
        $user = User::find($id);
        return $user;
        return $user;
        $user->name = $request->name;
        $user->alamat = $request->alamat;
        $user->email = $request->email;
        $user->save();

        return redirect()->route('list-user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // return $id;
        Berkas::with('user')->where('id_user', $id)->delete();
        Laporan::with('user')->where('id_user', $id)->delete();
        Keuangan::with('user')->where('id_user', $id)->delete();
        User::find($id)->delete();
        return redirect()->route('user.index');
    }

    public function ubahDeadline($id)
    {
        // return $id;
        $user = User::find($id);
        $date = $user->deadline;
        $user->deadline = date('Y-m-d', strtotime($date . '+121 day'));
        $user->save();

        return redirect()->back();
    }
}
