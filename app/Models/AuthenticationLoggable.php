<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuthenticationLoggable extends Model
{
    use HasFactory;
    protected $table = 'authentication_log';
    protected $guarded = ['id'];

    public function user(){
        return $this->belongsTo(User::class,'authenticatable_id');
    }

}
