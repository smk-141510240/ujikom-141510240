<?php

namespace App\Http\Controllers;

use App\tunjangan;
use App\jabatan;
use App\golongan;
use Validator;
use Input;
use Request;

class tunjanganController extends Controller
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
        $tunjangan = tunjangan::with('jabatan','golongan')->get();
        return view('tunjangan.index',compact('tunjangan'));
    }
    
    public function create()
    {
        $tunjangan = tunjangan::all();
        $jabatan = jabatan::all();
        $golongan = golongan::all();
        return view('tunjangan.create',compact('tunjangan','jabatan','golongan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules=['kode_tunjangan'=>'required|unique:tunjangans',
                'jabatan_id'=>'required',
                'golongan_id'=>'required',
                'status'=>'required',
                'jumlah_anak'=>'required|numeric|min:0',
                'besaran_uang'=>'required|numeric|min:1'];
        $sms=['kode_tunjangan.required'=>'Data tidak boleh kosong',
                'kode_tunjangan.unique'=>'Data tidak boleh sama',
                'jabatan_id.required'=>'Data tidak boleh kosong',
                'golongan_id.required'=>'Data tidak boleh kosong',
                'status.required'=>'Data tidak boleh kosong',
                'jumlah_anak.required'=>'Data tidak boleh kosong',
                'besaran_uang.required'=>'Data tidak boleh kosong',
                'jumlah_anak.numeric'=>'Hanya angka',
                'jumlah_anak.min'=>'Angka tidak boleh min',
                'besaran_uang.numeric'=>'Hanya angka',
                'besaran_uang.min'=>'Angka tidak boleh min',

                ];
        $valid=Validator::make(Input::all(),$rules,$sms);
        if ($valid->fails()) {

             
            return redirect('tunjangan/create')
            ->withErrors($valid)
            ->withInput();
        }
        else
        {
        //alert()->success('Data Tersimpan');
        $tunjangan=Request::all();
        tunjangan::create($tunjangan);
        return redirect('tunjangan');
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
        $tunjangan=tunjangan::find($id);
        return view('tunjangan.edit',compact('tunjangan','jabatan','golongan'));
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
        $tunjangan = tunjangan::where('id',$id)->first();
        if ($tunjangan['kode_tunjangan'] != request('kode_tunjangan'))
        {
            $rules=['kode_tunjangan'=>'required|unique:tunjangans',
                'jabatan_id'=>'required',
                'golongan_id'=>'required',
                'status'=>'required',
                'jumlah_anak'=>'required|numeric|min:1',
                'besaran_uang'=>'required|numeric|min:1'];
            $sms=['kode_tunjangan.required'=>'Data tidak boleh kosong',
                'kode_tunjangan.unique'=>'Data tidak boleh sama',
                'jabatan_id.required'=>'Data tidak boleh kosong',
                'golongan_id.required'=>'Data tidak boleh kosong',
                'status.required'=>'Data tidak boleh kosong',
                'jumlah_anak.required'=>'Data tidak boleh kosong',
                'besaran_uang.required'=>'Data tidak boleh kosong',
                'jumlah_anak.numeric'=>'Hanya angka',
                'jumlah_anak.min'=>'Angka tidak boleh min',
                'besaran_uang.numeric'=>'Hanya angka',
                'besaran_uang.min'=>'Angka tidak boleh min',

                ];
        }    
        else
        {
            $rules=['kode_tunjangan'=>'required',
                'jabatan_id'=>'required',
                'golongan_id'=>'required',
                'status'=>'required',
                'jumlah_anak'=>'required|numeric|min:0',
                'besaran_uang'=>'required|numeric|min:1'];
            $sms=['kode_tunjangan.required'=>'Data tidak boleh kosong',
                'kode_tunjangan.unique'=>'Data tidak boleh sama',
                'jabatan_id.required'=>'Data tidak boleh kosong',
                'golongan_id.required'=>'Data tidak boleh kosong',
                'status.required'=>'Data tidak boleh kosong',
                'jumlah_anak.required'=>'Data tidak boleh kosong',
                'besaran_uang.required'=>'Data tidak boleh kosong',
                'jumlah_anak.numeric'=>'Hanya angka',
                'jumlah_anak.min'=>'Angka tidak boleh min',
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
        $tunjanganUp=Request::all();
        $tunjangan=tunjangan::find($id);
        $tunjangan->update($tunjanganUp);
        return redirect('tunjangan');
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
        tunjangan::find($id)->delete();
        //alert()->success('Data Terhapus');
        return redirect('tunjangan');
    }
}
