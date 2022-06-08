<?php

namespace App\Models;

use Hashids\Hashids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function kegiatan(){
        return $this->belongsTo(Kegiatan::class,'kegiatan_id'); //1 proposal hanya dimiliki 1 UKM
    }
    public function user(){
        return $this->belongsTo(User::class,'admin_user');
    }

    public function getIdAttribute(){
        $hashids = new \Hashids\Hashids( env('MY_SECRET_SALT_KEY','MySecretSalt') );

        return $hashids->encode($this->attributes['id']);
    }
}
