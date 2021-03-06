<?php

namespace App\Http\Controllers;
use App\jabatan;
use Validator;
use Input;
use Request;

class jabatanController extends Controller
{
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        
        if (request()->has('nama_jabatan')) {
            $jabatan=jabatan::where('nama_jabatan',request('nama_jabatan'))->paginate(5);
            
        }
        else{
            $jabatan=jabatan::paginate(5);
        }
        return view('jabatan.index',compact('jabatan'));
    }
    
    public function create()
    {
        $jabatan = jabatan::all();
        return view('jabatan.create',compact('jabatan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules=['kode_jabatan'=>'required|unique:jabatans',
                'nama_jabatan'=>'required',
                'besaran_uang'=>'required|numeric|min:1'];
        $sms=['kode_jabatan.required'=>'Data tidak boleh kosong',
                'kode_jabatan.unique'=>'Data tidak boleh sama',
                'nama_jabatan.required'=>'Data tidak boleh kosong',
                'besaran_uang.required'=>'Data tidak boleh kosong',
                'besaran_uang.numeric'=>'Hanya angka',
                'besaran_uang.min'=>'Angka tidak boleh min',
                ];
        $valid=Validator::make(Input::all(),$rules,$sms);
        if ($valid->fails()) {

             
            return redirect('jabatan/create')
            ->withErrors($valid)
            ->withInput();
        }
        else
        {
        //alert()->success('Data Tersimpan');
        $jabatan=Request::all();
        jabatan::create($jabatan);
        return redirect('jabatan');
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
        $jabatan=jabatan::find($id);
        return view('jabatan.edit',compact('jabatan'));
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
        $jabatan1 = jabatan::where('id',$id)->first();
        if ($jabatan1['kode_jabatan'] != request('kode_jabatan'))
        {
            $rules=['kode_jabatan'=>'required|unique:jabatans',
                'nama_jabatan'=>'required',
                'besaran_uang'=>'required|numeric'];
            $sms=['kode_jabatan.required'=>'Data tidak boleh kosong',
                'kode_jabatan.unique'=>'Data tidak boleh sama',
                'nama_jabatan.required'=>'Data tidak boleh kosong',
                'besaran_uang.required'=>'Data tidak boleh kosong',
                'besaran_uang.numeric'=>'Hanya angka'
                ];
        }
        else
        {
            $rules=['kode_jabatan'=>'required',
                'nama_jabatan'=>'required',
                'besaran_uang'=>'required|numeric'];
            $sms=['kode_jabatan.required'=>'Data tidak boleh kosong',
                'kode_jabatan.unique'=>'Data tidak boleh sama',
                'nama_jabatan.required'=>'Data tidak boleh kosong',
                'besaran_uang.required'=>'Data tidak boleh kosong',
                'besaran_uang.numeric'=>'Hanya angka'
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
        $jabatanUp=Request::all();
        $jabatan=jabatan::find($id);
        $jabatan->update($jabatanUp);
        return redirect('jabatan');
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
        jabatan::find($id)->delete();
        //alert()->success('Data Terhapus');
        return redirect('jabatan');
    }
}
