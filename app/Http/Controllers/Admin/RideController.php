<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ride;
use Illuminate\Http\Request;

class RideController extends Controller
{
    public function index()
    {
        $rides = Ride::with(['driver', 'car'])->paginate(15);
        return view('admin.rides.index', compact('rides'));
    }

    public function create()
    {
        return view('admin.create');
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
        ]);

        $validated['driver_id'] = 1;
        $validated['car_id'] = 3;
        $validated['status'] = 'active';

        Ride::create($validated);

        return redirect('/admin/rides')->with('success', 'Поездка добавлена');
    }

    public function show($id)
    {
        $ride = Ride::with(['driver', 'car'])->findOrFail($id);
        return view('admin.rides.show', compact('ride'));
    }

    public function edit($id)
    {
        $ride = Ride::findOrFail($id);
        return view('admin.rides.edit', compact('ride'));
    }

    public function update(Request $request, $id)
    {
        $ride = Ride::findOrFail($id);

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

        return redirect('/admin/rides')->with('success', 'Поездка обновлена');
    }

    public function destroy($id)
    {
        $ride = Ride::findOrFail($id);
        $ride->delete();

        return redirect('/admin/rides')->with('success', 'Поездка удалена');
    }
}