<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Hashids\Hashids;
use PDO;

class Laporan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];


    public function kegiatan(){
        return $this->belongsTo(Kegiatan::class); //1 Laporan hanya dimiliki oleh 1 kegiatan
    }

    public function getIdAttribute(){
        $hashids = new \Hashids\Hashids( env('MY_SECRET_SALT_KEY','MySecretSalt') );

        return $hashids->encode($this->attributes['id']);
    }
}
