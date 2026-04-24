<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function myCars()
    {
        $cars = Car::where('user_id', auth()->id())->paginate(25);
        return view('my-cars.index', compact('cars'));
    }

    public function create()
    {
        return view('my-cars.create');
    }

    public function save(Request $request)
    {
        $validated = $request->validate([
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'color' => 'nullable|string|max:50',
            'license_plate' => 'required|string|unique:cars',
            'passenger_seats' => 'required|integer|min:1|max:8',
        ]);

        $validated['user_id'] = auth()->id();

        Car::create($validated);
        
        return redirect('/my-cars')->with('success', 'Машина добавлена');
    }

    public function show($id)
    {
        $car = Car::where('user_id', auth()->id())->findOrFail($id);
        return view('my-cars.show', compact('car'));
    }

    public function edit($id)
    {
        $car = Car::where('user_id', auth()->id())->findOrFail($id);
        return view('my-cars.edit', compact('car'));
    }

    public function update(Request $request, $id)
    {
        $car = Car::where('user_id', auth()->id())->findOrFail($id);
        
        $validated = $request->validate([
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'color' => 'nullable|string|max:50',
            'license_plate' => 'required|string|unique:cars,license_plate,' . $id,
            'passenger_seats' => 'required|integer|min:1|max:8',
        ]);

        $car->update($validated);
        
        return redirect('/my-cars')->with('success', 'Машина обновлена');
    }

    public function destroy($id)
    {
        $car = Car::where('user_id', auth()->id())->findOrFail($id);
        $car->delete();
        
        return redirect('/my-cars')->with('success', 'Машина удалена');
    }
}