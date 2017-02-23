<?php

namespace App\Http\Controllers;

use App\pegawai;
use App\User;
use App\tunjangan;
use App\golongan;
use App\tunjangan_pegawai;
use Request;
use Input;
use Validator;

class tunjanganpegawaiController extends Controller
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
        $tunjangan_pegawai = tunjangan_pegawai::with('tunjangan','pegawai')->get();
        return view('tunjangan_pegawai.index',compact('tunjangan_pegawai'));
    }
    
    public function create()
    {
        $tunjangan_pegawai = tunjangan_pegawai::all();
        $pegawai = pegawai::all();
        $tunjangan = tunjangan::all();
        return view('tunjangan_pegawai.create',compact('tunjangan_pegawai','pegawai','tunjangan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $tunjangan_pegawai = Request::all();
        $rules=[
                'pegawai_id'=>'required|unique:tunjangan_pegawais',];
        $sms=[  
                'pegawai_id.required'=>'Data tidak boleh kosong',
                'pegawai_id.unique'=>'Data tidak boleh sama',
                ];
        $valid=Validator::make(Input::all(),$rules,$sms);
        if ($valid->fails()) {

             
            return redirect('tunjangan_pegawai/create')
            ->withErrors($valid)
            ->withInput();
        }
        else
       {

       $pegawai = pegawai::where('id',$tunjangan_pegawai['pegawai_id'])->first();
       $check = tunjangan::where('jabatan_id',$pegawai->jabatan_id)->where('golongan_id',$pegawai->golongan_id)->first();
       if(!isset($check)){
           $pegawai = pegawai::with('User')->get();
           $missing_count = true;
           // dd($error_klnf);
           return view('tunjangan_pegawai.create',compact('tunjangan_pegawai','pegawai','missing_count'));
       }
        $tunjangan_pegawai['kode_tunjangan_id'] = $check->id;
        tunjangan_pegawai::create($tunjangan_pegawai);
       }
       return redirect('tunjangan_pegawai');

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
        $pegawai = pegawai::all();
        $tunjangan = tunjangan::all();
        $tunjangan_pegawai=tunjangan_pegawai::find($id);
        return view('tunjangan_pegawai.edit',compact('tunjangan_pegawai','pegawai','tunjangan'));
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
        $tunjangan_pegawai = tunjangan_pegawai::where('id',$id)->first();
        if ($tunjangan_pegawai['kode_tunjangan'] != request('kode_tunjangan'))
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
        $tunjangan_pegawai=tunjangan_pegawai::find($id);
        $tunjangan_pegawai->update($tunjanganUp);
        return redirect('tunjangan_pegawai');
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
        tunjangan_pegawai::find($id)->delete();
        //alert()->success('Data Terhapus');
        return redirect('tunjangan_pegawai');
    }
}
