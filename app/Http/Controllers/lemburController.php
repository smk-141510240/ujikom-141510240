<?php

namespace App\Http\Controllers;

use App\lembur_pegawai;
use App\kategori_lembur;
use App\pegawai;
use App\User;
use Validator;
use Input;
use Request;

class lemburController extends Controller
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
        $lembur = lembur_pegawai::with('kategori_lembur','pegawai')->get();
        return view('lembur.index',compact('lembur'));
    }
    
    public function create()
    {
        $lembur = lembur_pegawai::all();
        $kategori = kategori_lembur::all();
        $pegawai = pegawai::all();
        return view('lembur.create',compact('lembur','kategori','pegawai'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lembur_pegawai=Request::all();
        $rules=[
                'jumlah_jam'=>'required|numeric|min:1'];
        $sms=[
                'jumlah_jam.required'=>'Data tidak boleh kosong',
                'jumlah_jam.numeric'=>'Hanya angka',
                'jumlah_jam.min'=>'Angka tidak boleh min',
                ];
        $valid=Validator::make(Input::all(),$rules,$sms);
        if ($valid->fails()) {

             
            return redirect('lembur/create')
            ->withErrors($valid)
            ->withInput();
        }
        else
        {
        //alert()->success('Data Tersimpan');
            $pegawai = pegawai::where('id',$lembur_pegawai['pegawai_id'])->first();
        $check = kategori_lembur::where('jabatan_id',$pegawai->jabatan_id)->where('golongan_id',$pegawai->golongan_id)->first();
        if(!isset($check)){
            $pegawai = pegawai::with('User')->get();
            $missing_count = true;
            // dd($error_klnf);
            return view('lemburpegawai.create',compact('kategori_lembur','pegawai','missing_count'));
        }
        $lembur_pegawai['kode_lembur_id'] = $check->id;
        
        lembur_pegawai::create($lembur_pegawai);
        
        return redirect('lembur');
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
        $lembur=lembur_pegawai::find($id);
        $kategori = kategori_lembur::all();
        $pegawai = pegawai::all();
        return view('lembur.edit',compact('lembur','kategori','pegawai'));
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
        $lembur1 = lembur_pegawai::where('id',$id)->first();
        if ($lembur1['kode_lembur_id'] != request('kode_lembur_id'))
        {
            $rules=[
                'jumlah_jam'=>'required|numeric|min:1'];
            $sms=[
                'jumlah_jam.required'=>'Data tidak boleh kosong',
                'jumlah_jam.numeric'=>'Hanya angka',
                'jumlah_jam.min'=>'Angka tidak boleh min',
                ];
        }
        else
        {
            $rules=['kode_lembur_id'=>'required',
                'pegawai_id'=>'required',
                'jumlah_jam'=>'required|numeric|min:1'];
            $sms=['kode_lembur_id.required'=>'Data tidak boleh kosong',
                'kode_lembur_id.unique'=>'Data tidak boleh sama',
                'pegawai_id.required'=>'Data tidak boleh kosong',
                'jumlah_jam.required'=>'Data tidak boleh kosong',
                'jumlah_jam.numeric'=>'Hanya angka',
                'jumlah_jam.min'=>'Angka tidak boleh min',
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
        $lemburUp=Request::all();
        $lembur=lembur_pegawai::find($id);
        $lembur->update($lemburUp);
        return redirect('lembur');
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
        lembur_pegawai::find($id)->delete();
        //alert()->success('Data Terhapus');
        return redirect('lembur');
    }
}
