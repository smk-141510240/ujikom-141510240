<?php

namespace App\Http\Controllers;

use App\pegawai;
use App\User;
use App\jabatan;
use App\golongan;
use Illuminate\Http\Request;

use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;

class pegawaiController extends Controller
{
    use RegistersUsers;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pegawai = pegawai::with('User','jabatan','golongan')->get();
        return view('pegawai.index',compact('pegawai'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $pegawai = pegawai::all();
        $jabatan = jabatan::all();
        $golongan = golongan::all();
        return view('pegawai.create',compact('pegawai','jabatan','golongan'));
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
        $this->validate($request,[
            'name' => 'required|max:255',
            'nip' => 'required|min:3|numeric|unique:pegawais',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'permission' => 'required|max:255',
        ]);
        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'permission' => $request->get('permission'),
            'password' => bcrypt($request->get('password')),
        ]);

        $pegawai=new pegawai;
        $pegawai->nip = $request->get('nip');
        $pegawai->jabatan_id = $request->get('jabatan_id');
        $pegawai->golongan_id = $request->get('golongan_id');
        $pegawai->user_id = $user->id;
        $pegawai->photo = $request->get('photo');
        $pegawai->save();
        return redirect('/pegawai');
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
}
