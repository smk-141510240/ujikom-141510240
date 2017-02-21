<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lembur_pegawai extends Model
{
    //
    protected $table= 'lembur_pegawais';
    protected $fillable = ['id','kode_lembur_id','pegawai_id','jumlah_jam'];
    protected $visible =  ['id','kode_lembur_id','pegawai_id','jumlah_jam'];

    public function kategori_lembur()
    {
    	return $this->belongsto('App\kategori_lembur','kode_lembur_id');
    }
    public function pegawai()
    {
    	return $this->belongsto('App\pegawai','pegawai_id');
    }
}
