<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Ride;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with(['ride'])->where('passenger_id', auth()->id())->paginate(15);
        return view('my-bookings.index', compact('bookings'));
    }

    public function save(Request $request, $id)
    {
        $ride = Ride::findOrFail($id);

        $existingBooking = Booking::where('ride_id', $ride->id)
            ->where('passenger_id', auth()->id())
            ->first();

        if ($existingBooking) {
            return redirect()->back()->with('error', 'Вы уже записаны на эту поездку');
        }

        if ($ride->free_seats <= 0) {
            return redirect()->back()->with('error', 'Нет свободных мест');
        }

        Booking::create([
            'ride_id' => $ride->id,
            'passenger_id' => auth()->id(),
            'status' => 'confirmed',
        ]);

        $ride->decrement('free_seats');

        return redirect('/my-bookings')->with('success', 'Вы записались на поездку');
    }

    public function destroy($id)
    {
        $booking = Booking::where('passenger_id', auth()->id())->findOrFail($id);

        $ride = $booking->ride;
        $ride->increment('free_seats');

        $booking->delete();

        return redirect('/my-bookings')->with('success', 'Запись отменена');
    }

    public function show($id)
    {
        $booking = Booking::where('passenger_id', auth()->id())->findOrFail($id);
        return view('my-bookings.show', compact('booking'));
    }
}