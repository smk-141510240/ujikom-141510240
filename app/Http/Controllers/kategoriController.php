<?php

namespace App\Http\Controllers;

use App\kategori_lembur;
use App\jabatan;
use App\golongan;
use Validator;
use Input;
use Request;

class kategoriController extends Controller
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
        $kategori = kategori_lembur::with('jabatan','golongan')->get();
        return view('kategori.index',compact('kategori'));
    }
    
    public function create()
    {
        $kategori = kategori_lembur::all();
        $jabatan = jabatan::all();
        $golongan = golongan::all();
        return view('kategori.create',compact('kategori','jabatan','golongan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules=['kode_lembur'=>'required|unique:kategori_lemburs',
                'jabatan_id'=>'required',
                'golongan_id'=>'required',
                'besaran_uang'=>'required|numeric|min:1'];
        $sms=['kode_lembur.required'=>'Data tidak boleh kosong',
                'kode_lembur.unique'=>'Data tidak boleh sama',
                'jabatan_id.required'=>'Data tidak boleh kosong',
                'golongan_id.required'=>'Data tidak boleh kosong',
                'besaran_uang.required'=>'Data tidak boleh kosong',
                'besaran_uang.numeric'=>'Hanya angka',
                'besaran_uang.min'=>'Angka tidak boleh min',                
                ];
        $valid=Validator::make(Input::all(),$rules,$sms);
        if ($valid->fails()) {

             
            return redirect('kategori/create')
            ->withErrors($valid)
            ->withInput();
        }
        else
        {
        //alert()->success('Data Tersimpan');
        $kategori=Request::all();
        kategori_lembur::create($kategori);
        return redirect('kategori');
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
        $jabatan = jabatan::all();
        $golongan = golongan::all();
        $kategori=kategori_lembur::find($id);
        return view('kategori.edit',compact('kategori','jabatan','golongan'));
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
        $kategori1 = kategori_lembur::where('id',$id)->first();
        if ($kategori1['kode_lembur'] != request('kode_lembur'))
        {
            $rules=['kode_lembur'=>'required|unique:kategori_lemburs',
                'jabatan_id'=>'required',
                'golongan_id'=>'required',
                'besaran_uang'=>'required|numeric|min:1'];
            $sms=['kode_lembur.required'=>'Data tidak boleh kosong',
                'kode_lembur.unique'=>'Data tidak boleh sama',
                'jabatan_id.required'=>'Data tidak boleh kosong',
                'golongan_id.required'=>'Data tidak boleh kosong',
                'besaran_uang.required'=>'Data tidak boleh kosong',
                'besaran_uang.numeric'=>'Hanya angka',
                'besaran_uang.min'=>'Angka tidak boleh min',                
                ];
        }
        else
        {
            $rules=['kode_lembur'=>'required',
                'jabatan_id'=>'required',
                'golongan_id'=>'required',
                'besaran_uang'=>'required|numeric|min:1'];
            $sms=['kode_lembur.required'=>'Data tidak boleh kosong',
                'kode_lembur.unique'=>'Data tidak boleh sama',
                'jabatan_id.required'=>'Data tidak boleh kosong',
                'golongan_id.required'=>'Data tidak boleh kosong',
                'besaran_uang.required'=>'Data tidak boleh kosong',
                'besaran_uang.numeric'=>'Hanya angka',
                'besaran_uang.min'=>'Angka tidak boleh min',                
                ];    
        }
        $valid=Validator::make(Input::all(),$rules,$sms);
        if ($valid->fails()) {

             
            return redirect()->back()
            ->withErrors($valid)
            ->withInput();
        }
        else
        {
        $kategoriUp=Request::all();
        $kategori=kategori_lembur::find($id);
        $kategori->update($kategoriUp);
        return redirect('kategori');
        }
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
        kategori_lembur::find($id)->delete();
        //alert()->success('Data Terhapus');
        return redirect('kategori');
    }
}
