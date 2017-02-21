<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pegawai extends Model
{
    //
    protected $table= 'pegawais';
    

    public function User()
    {
    	return $this->belongsto('App\User','user_id');
    }
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
    	return $this->HasOne('App\tunjangan_pegawais','pegawai_id');
    }
    public function lembur_pegawai()
    {
    	return $this->HasMany('App\lembur_pegawai','pegawai_id');
    }
}
