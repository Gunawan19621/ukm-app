<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PDO;

class Kegiatan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];


    public function ukm(){
        return $this->belongsTo(UKM::class); //1 Kegiatan hanya dimiliki 1 UKM
    }

    public function laporan(){
        return $this->hasMany(Laporan::class); //1 Kegiatan memiliki banyak laporan
    }

    public function logbook(){
        return $this->belongsTo(Logbook::class); //1 Kegiatan memiliki 1 logbook
    }

    public function proposal(){
        return $this->belongsTo(Proposal::class); //1 proposal memiliki 1 UKM
    }
}
