<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Antrean extends Model
{
    use HasFactory;
    protected $table="antrean";

    protected $primaryKey = 'id_antrean';

    use HasFactory;
    protected $fillable = [
        'id_antrean',
        'id_user',
        'id_jadwal',
        'jenis_hewan',
        'keluhan',
        'status',
        'foto',
    ];
    public function jadwal(){
        return $this->belongsTo(Jadwal::class, 'id_jadwal')->withTrashed();
    }

    public function user(){
        return $this->belongsTo(User::class, 'id_user');
    }

}
