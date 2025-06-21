<?php

namespace App\Http\Controllers;

use App\Models\PetHotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PetHotelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $bookings = PetHotel::where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();
        return view('pet-hotel.index', compact('bookings'));
    }

    public function create(Request $request)
    {
        // Jika user belum login, redirect ke halaman login
        if (!Auth::check()) {
            return redirect()->route('login')->with('message', 'Silakan login terlebih dahulu untuk melakukan booking.');
        }

        $pet_type = $request->query('pet_type');
        // Validasi pet_type harus dog atau cat
        if ($pet_type && !in_array($pet_type, ['dog', 'cat'])) {
            return redirect()->route('pet-hotel.create');
        }

        return view('pet-hotel.create', compact('pet_type'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'pet_name' => 'required|string|max:255',
            'pet_type' => 'required|in:dog,cat',
            'pet_breed' => 'nullable|string|max:255',
            'pet_age' => 'required|integer|min:0',
            'special_notes' => 'nullable|string',
            'check_in_date' => 'required|date|after_or_equal:today',
            'check_out_date' => 'required|date|after:check_in_date',
            'room_type' => 'required|in:standard,deluxe,premium',
        ]);

        $booking = new PetHotel($validated);
        $booking->user_id = Auth::id();
        $booking->status = 'pending';
        $booking->total_price = $booking->calculatePrice();
        $booking->save();

        return redirect()->route('pet-hotel.index')->with('success', 'Booking berhasil dibuat!');
    }

    public function show(PetHotel $petHotel)
    {
        if ($petHotel->user_id !== Auth::id()) {
            return redirect()->route('pet-hotel.index')->with('error', 'Anda tidak memiliki akses ke booking ini.');
        }
        return view('pet-hotel.show', compact('petHotel'));
    }

    public function cancel(PetHotel $petHotel)
    {
        if ($petHotel->user_id !== Auth::id()) {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }

        $petHotel->status = 'cancelled';
        $petHotel->save();

        return redirect()->route('pet-hotel.index')->with('success', 'Booking berhasil dibatalkan.');
    }
}
