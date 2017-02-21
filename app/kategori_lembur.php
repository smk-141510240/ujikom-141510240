<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kategori_lembur extends Model
{
    //
    protected $table= 'kategori_lemburs';
    protected $fillable = ['id','kode_lembur','jabatan_id','golongan_id','besaran_uang'];
    protected $visible =  ['id','kode_lembur','jabatan_id','golongan_id','besaran_uang'];

    public function jabatan()
    {
    	return $this->belongsto('App\jabatan','jabatan_id');
    }
    public function golongan()
    {
    	return $this->belongsto('App\golongan','golongan_id');
    }
    public function lembur_pegawai()
    {
    	return $this->HasMany('App\lembur_pegawai','kode_lembur_id');
    }
}
