<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetHotel extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'pet_name',
        'pet_type',
        'pet_breed',
        'pet_age',
        'special_notes',
        'check_in_date',
        'check_out_date',
        'room_type',
        'status',
        'total_price'
    ];

    protected $casts = [
        'check_in_date' => 'date',
        'check_out_date' => 'date',
        'total_price' => 'decimal:2'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function calculatePrice()
    {
        $days = $this->check_in_date->diffInDays($this->check_out_date);
        $base_price = [
            'standard' => 100000, // Rp. 100.000 per hari
            'deluxe' => 150000,   // Rp. 150.000 per hari
            'premium' => 200000    // Rp. 200.000 per hari
        ];

        return $days * $base_price[$this->room_type];
    }
}
