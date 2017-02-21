<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tunjangan extends Model
{
    //
    protected $table= 'tunjangans';
    protected $fillable = ['id','kode_tunjangan','jabatan_id','golongan_id','status','jumlah_anak','besaran_uang'];
    protected $visible =  ['id','kode_tunjangan','jabatan_id','golongan_id','status','jumlah_anak','besaran_uang'];

    public function jabatan()
    {
    	return $this->belongsto('App\jabatan','jabatan_id');
    }
    public function golongan()
    {
    	return $this->belongsto('App\golongan','golongan_id');
    }
    public function tunjangan_pegawais()
    {
    	return $this->HasMany('App\tunjangan_pegawais','kode_tunjangan_id');
    }
}
