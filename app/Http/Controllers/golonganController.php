<?php

namespace App\Http\Controllers;
use App\golongan;
use Validator;
use Input;
use Request;

class golonganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $golongan = golongan::all();
        return view('golongan.index',compact('golongan'));
    }
    
    public function create()
    {
        $golongan = golongan::all();
        return view('golongan.create',compact('golongan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules=['kode_golongan'=>'required|unique:golongans',
                'nama_golongan'=>'required',
                'besaran_uang'=>'required|numeric'];

        $sms=[  'kode_golongan.required'=>'Harus Di Isi',
                'kode_golongan.unique'=>'Tidak Boleh Sama',
                'nama_golongan.required'=>'Harus Di Isi',
                'besaran_uang.required'=>'Harus Di Isi',
                'besaran_uang.numeric'=>'Harus Angka'
                ];
        $valid=Validator::make(Input::all(),$rules,$sms);
        if ($valid->fails()) {
  
            return redirect('golongan/create')
            ->withErrors($valid)
            ->withInput();
        }
        else
        {
        //alert()->success('Data Tersimpan');
        $golongan=Request::all();
        golongan::create($golongan);
        return redirect('golongan');
        }
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
        $golongan=golongan::find($id);
        return view('golongan.edit',compact('golongan'));
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
        $golonganUp=Request::all();
        $golongan=golongan::find($id);
        $golongan->update($golonganUp);
        return redirect('golongan');
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
        golongan::find($id)->delete();
        //alert()->success('Data Terhapus');
        return redirect('golongan');
    }
}
