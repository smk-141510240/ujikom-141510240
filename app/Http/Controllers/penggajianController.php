<?php
namespace App\Http\Controllers;
use Request;
use DB;
use App\lembur_pegawai;
use App\tunjangan_pegawai;
use App\pegawai;
use App\tunjangan;
use App\penggajian;
use App\jabatan;
use App\kategori_lembur;
use App\golongan;
use App\User;
use Carbon\Carbon;
class PenggajianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct (){
        $this->middleware('auth');
    }
    public function index()
    {
       $penggajian = penggajian::paginate(3);
        return view('penggajian.index',compact('penggajian'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     $pegawai = pegawai::with('User')->get();
     $tunjangan_pegawai=tunjangan_pegawai::all();
     return view('penggajian.create',compact('pegawai','tunjangan_pegawai'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $penggajian = Request::all();
        $now = Carbon::now();
            $kode_tunjangan_id = tunjangan_pegawai::where('pegawai_id', $penggajian['pegawai_id'])->first();
            $tunjangan_pegawai = tunjangan_pegawai::where('pegawai_id',$penggajian['pegawai_id'])->first();
    // $hari = cal_days_in_month($now->day,$now->month, $now->year);
    //     dd($hari); 
    if($tunjangan_pegawai==null)
        {
            $missing_count=true;
            $pegawai = pegawai::with('User')->get();
            return view('penggajian.create',compact('missing_count','pegawai'));
        }
        else
        {
            $penggajian1 = penggajian::where('tunjangan_pegawai_id', $kode_tunjangan_id->id)->first();
            if(isset($penggajian1->id))
            {
            if($penggajian1->created_at->month==$now->month)
            {
                return redirect('penggajian/create'.'?errors_match');
            }
            }
        $user = $penggajian['pegawai_id'];
        $jumlah_jam_lembur = DB::table('lembur_pegawais')
        ->where('lembur_pegawais.pegawai_id', '=', $user)
        ->sum('lembur_pegawais.jumlah_jam');
               
        $pegawai = pegawai::where('id',$penggajian['pegawai_id'])->first();
        $kategori_lembur = kategori_lembur::where('jabatan_id',$pegawai->jabatan_id)->where('golongan_id',$pegawai->golongan_id)->first();
        $jabatan = jabatan::where('id',$pegawai->jabatan_id)->first();
        $golongan = golongan::where('id',$pegawai->golongan_id)->first();
        $lembur_pegawai = lembur_pegawai::where('pegawai_id',$penggajian['pegawai_id'])->first();
        $gaji_pokok = jabatan::where('besaran_uang')->first();
        $tunjangan = tunjangan::where('id',$tunjangan_pegawai->kode_tunjangan_id)->first();
        $penggajian['tunjangan_pegawai_id']= $tunjangan_pegawai->id;
        $penggajian['jumlah_jam_lembur']= (int)$jumlah_jam_lembur;
        $penggajian['jumlah_uang_lembur']= $kategori_lembur->besaran_uang*(int)$jumlah_jam_lembur;
        $penggajian['gaji_pokok']= $jabatan->besaran_uang+$golongan->besaran_uang;
        $penggajian['total_gaji']= $penggajian['gaji_pokok']+$penggajian['jumlah_uang_lembur']+$tunjangan->besaran_uang;
        $penggajian['status_pengambilan']=0;
        penggajian::create($penggajian);
        }
        return redirect('penggajian');
        
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $data = penggajian::where('id',$id)->with('tunjangan_pegawai')->first();
        // $pegawai = pegawai::where('id',$data->tunjangan_pegawai->pegawai_id)->with('user','jabatan','golongan','tunjangan_pegawai')->first();
        // $lemburs = lembur_pegawai::where('pegawai_id',$pegawai->id)->first();
        // $kategori_lembur = kategori_lembur::where('id',$lemburs->first()->kode_lembur_id)->first();
        
        // $tunjangan = tunjangan::where('id',$data->tunjangan_pegawai->kode_tunjangan_id)->first();
        // // dd($data,$pegawai,$lemburs,$kategori_lembur,$tunjangan);
        // return view('penggajian.show',compact('data','pegawai','lemburs','kategori_lembur','tunjangan'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Htt
     p\Response
     */
    public function edit($id)
    {
        $data = penggajian::where('id',$id)->first();
        return view('penggajian.edit',compact('data'));
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
        $now = Carbon::now();
        $data = Request::all();
        // $old_tunjangan_pegawai = tunjangan_pegawai::where('id', $old_penggajian->tunjangan_pegawai_id)->first();
        // $old_pegawai = pegawai::where('id',$old_tunjangan_pegawai->pegawai_id)->first();
        // $old_jabatan = jabatan::where('id',$old_pegawai->jabatan_id)->first();
        // $old_golongan = golongan::where('id',$old_pegawai->golongan_id)->first();
        // $old_lembur_pegawai = lembur_pegawai::where('pegawai_id',$old_pegawai->id)->first();
        // dd($data['petugas_penerima']);
        penggajian::where('id', $id)->first()->update([
            'tanggal_pengambilan' => $now,
            'status_pengambilan' => $data['status_pengambilan'],
            'petugas_penerima' => $data['petugas_penerima'],
            ]);
        return redirect('penggajian');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        penggajian::find($id)->delete();
        return redirect('penggajian');
    }
}