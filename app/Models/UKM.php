<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class UKM extends Model
{
    use HasFactory,Sluggable;
    protected $guarded = ['id'];

    public function kegiatan(){
        return $this->hasMany(Kegiatan::class);
    }
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'nama_ukm'
            ]
        ];
    }
}
