<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tunjangan_pegawai extends Model
{
    //
    protected $table= 'tunjangan_pegawais';
    protected $fillable = ['id','kode_tunjangan_id','pegawai_id'];
    protected $visible =  ['id','kode_tunjangan_id','pegawai_id'];

    public function tunjangan()
    {
    	return $this->belongsto('App\tunjangan','kode_tunjangan_id');
    }
    public function pegawai()
    {
    	return $this->belongsto('App\pegawai','pegawai_id');
    }
    public function penggajian()
    {
    	return $this->HasMany('App\penggajian','tunjangan_pegawai_id');
    }
}
