<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class penggajian extends Model
{
    //
    protected $table= 'penggajians';
    protected $fillable = ['id','tunjangan_pegawai_id','jumlah_jam_lembur','jumlah_uang_lembur','gaji_pokok','total_gaji','tanggal_pengambilan','status_pengambilan','petugas_penerima'];
    protected $visible =  ['id','tunjangan_pegawai_id','jumlah_jam_lembur','jumlah_uang_lembur','gaji_pokok','total_gaji','tanggal_pengambilan','status_pengambilan','petugas_penerima'];

    public function tunjangan_pegawai()
    {
    	return $this->belongsto('App\tunjangan_pegawai','tunjangan_pegawai_id');
    }
}
