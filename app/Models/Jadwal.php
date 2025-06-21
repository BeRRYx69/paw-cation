<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jadwal extends Model
{
    use HasFactory, SoftDeletes;
    protected $table="jadwal";
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'jadwal_date',
        'jam_sesi',
        'jumlah',

    ];

    protected $dates = [ 'deleted_at' ];


    public function antrean()
    {
        return $this->hasMany(Antrean::class);
    }
}
