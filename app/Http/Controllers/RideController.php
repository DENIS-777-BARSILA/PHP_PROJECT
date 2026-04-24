<?php

namespace App\Http\Controllers;

use App\Models\Ride;
use Illuminate\Http\Request;

class RideController extends Controller
{
    public function index()
    {
        $rides = Ride::with(['driver', 'car'])->where('status', 'active')->paginate(15);
        return view('rides.index', compact('rides'));
    }

    public function show($id)
    {
        $ride = Ride::with(['driver', 'car'])->findOrFail($id);
        return view('rides.show', compact('ride'));
    }

    public function myRides()
    {
        $rides = Ride::where('driver_id', auth()->id())->paginate(15);
        return view('my-rides.index', compact('rides'));
    }

    public function create()
    {
        return view('my-cars.index');
    }

    public function save(Request $request)
    {
        $validated = $request->validate([
            'from' => 'required|string|max:255',
            'to' => 'required|string|max:255',
            'departure_time' => 'required|date',
            'free_seats' => 'required|integer|min:1|max:8',
            'price' => 'nullable|numeric|min:0',
            'regularity' => 'required|string',
            'description' => 'nullable|string',
        ]);

        $validated['driver_id'] = auth()->id();
        $validated['car_id'] = 1;
        $validated['status'] = 'active';

        Ride::create($validated);

        return redirect('/my-rides')->with('success', 'Поездка создана');
    }

    public function edit($id)
    {
        $ride = Ride::where('driver_id', auth()->id())->findOrFail($id);
        return view('rides.edit', compact('ride'));
    }

    public function update(Request $request, $id)
    {
        $ride = Ride::where('driver_id', auth()->id())->findOrFail($id);

        $validated = $request->validate([
            'from' => 'required|string|max:255',
            'to' => 'required|string|max:255',
            'departure_time' => 'required|date',
            'free_seats' => 'required|integer|min:1|max:8',
            'price' => 'nullable|numeric|min:0',
            'description' => 'nullable|string',
            'status' => 'required|string',
        ]);

        $ride->update($validated);

        return redirect('/my-rides')->with('success', 'Поездка обновлена');
    }

    public function destroy($id)
    {
        $ride = Ride::where('driver_id', auth()->id())->findOrFail($id);
        $ride->delete();

        return redirect('/my-rides')->with('success', 'Поездка удалена');
    }
}