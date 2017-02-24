<?php

namespace App\Http\Controllers;

use App\pegawai;
use App\User;
use App\jabatan;
use App\golongan;
use Illuminate\Http\Request;
use Input;
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
    // public function __construct()
    // {
    //     $this->middleware('ManagerMiddleware');
    // }
    public function __construct()
    {
        $this->middleware('auth');
    }
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
        $file = Input::file('photo');
        $dis = public_path().'/assets';
        $filen = str_random(6).'_'.$file->getClientOriginalName();
        $upload = $file->move($dis,$filen);
        if(Input::hasFile('photo'))
        {
            $pegawai=new pegawai;
            $pegawai->nip = Input::get('nip');
            $pegawai->jabatan_id = Input::get('jabatan_id');
            $pegawai->golongan_id = Input::get('golongan_id');    
        }
        $pegawai->photo=$filen;
        $pegawai->user_id = $user->id;
        
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
        //$pegawai=pegawai::with('User')->find($id);
        $pegawai=pegawai::find($id);
        $jabatan = jabatan::all();
        $golongan = golongan::all();
        $user = User::all();
        return view('pegawai.edit',compact('pegawai','jabatan','golongan','user'));
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
        // $pegawai1 = pegawai::where('id',$id)->first();
        // $user1 = User::where('id',$id)->first();
        // if ($pegawai1['nip'] != request('nip'))
        // {   
        //     $this->validate($request,[
        //     'name' => 'required|max:255',
        //     'nip' => 'required|min:3|numeric|unique:pegawais',
        //     'email' => 'required|email|max:255|unique:users',
        //     'password' => 'required|min:6|confirmed',
        //     'permission' => 'required|max:255',
        //     ]);
        // }
        // else
        // {
        //     $this->validate($request,[
        //     'name' => 'required|max:255',
        //     'nip' => 'required|min:3|numeric',
        //     'email' => 'required|email|max:255',
        //     'password' => 'required|min:6|confirmed',
        //     'permission' => 'required|max:255',
        // ]);
        // }
        // $file = Input::file('photo');
        // $dis = public_path().'/assets';
        // $filen = str_random(6).'_'.$file->getClientOriginalName();
        // $upload = $file->move($dis,$filen);
        // if(Input::hasFile('photo'))
        // {
        //     $pegawai=pegawai::find($id);
        //     $pegawai->nip = Input::get('nip');
        //     $pegawai->jabatan_id = Input::get('jabatan_id');
        //     $pegawai->golongan_id = Input::get('golongan_id');
        //     $user=User::find($id);
        //     $user->name = Input::get('name');
        //     $user->permission = Input::get('permission');    
        // }
        // $pegawai->photo=$filen;
        // $pegawai->user_id = $user->id;
        
        // $pegawai->update();
        // return redirect('pegawai');
        $pegawai1 = pegawai::where('id',$id)->first();
        if ($pegawai1['nip'] != request('nip'))
        {
            $rules=['nip'=>'required|unique:pegawais',
                'jabatan_id'=>'required',
                'golongan_id'=>'required',
                'photo' => 'required'];
            $sms=['nip.required'=>'Data tidak boleh kosong',
                'nip.unique'=>'Data tidak boleh sama',
                'jabatan_id.required'=>'Data tidak boleh kosong',
                'golongan_id.required'=>'Data tidak boleh kosong',
                'photo.required'=>'Data tidak boleh kosong',
                ];
        }
        else
        {
            $rules=['nip'=>'required',
                'jabatan_id'=>'required',
                'golongan_id'=>'required',
                'photo' => 'required'];
            $sms=['nip.required'=>'Data tidak boleh kosong',
                'nip.unique'=>'Data tidak boleh sama',
                'jabatan_id.required'=>'Data tidak boleh kosong',
                'golongan_id.required'=>'Data tidak boleh kosong',
                'photo.required'=>'Data tidak boleh kosong',
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
        $file = Input::file('photo');
        $dis = public_path().'/assets';
        $filen = str_random(6).'_'.$file->getClientOriginalName();
        $upload = $file->move($dis,$filen);
        if(Input::hasFile('photo'))
        {
            
            
            $pegawai = pegawai::find($id);
            $pegawai->nip = Input::get('nip');
            $pegawai->jabatan_id = Input::get('jabatan_id');
            $pegawai->golongan_id = Input::get('golongan_id');

            
        
            
            
        }
        $user=User::all();
        $pegawai->photo=$filen;
        $pegawai->user_id = $pegawai->User->id;
        $pegawai->update();
        // $pegawai->update();

        return redirect('/pegawai');
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
        pegawai::find($id)->delete();
        //alert()->success('Data Terhapus');
        return redirect('pegawai');
    }
}
