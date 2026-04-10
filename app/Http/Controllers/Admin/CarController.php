<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function create()
    {
        return view('admin.cars.create');
    }


    public function save(Request $request)
    {
        $validated = $request->validate([
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'license_plate' => 'required|string|unique:cars',
            'passenger_seats' => 'required|integer|min:1|max:8',
        ]);

        Car::create($validated);
        
        return redirect()->route('admin.cars.index')
            ->with('success', 'Машина добавлена');
    }

    public function show_all()
    {
        $cars = Car::paginate(15);
        return view('admin.cars.index', compact('cars'));
    }

    public function show($id)
    {
        $car = Car::findOrFail($id);
        return view('admin.cars.show', compact('car'));
    }

    public function edit($id)
    {
        $car = Car::findOrFail($id);
        return view('admin.cars.edit', compact('car'));
    }

    public function update(Request $request, $id)
    {
        $car = Car::findOrFail($id);
        
        $validated = $request->validate([
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'license_plate' => 'required|string|unique:cars,license_plate,' . $id,
            'passenger_seats' => 'required|integer|min:1|max:8',
        ]);

        $car->update($validated);
        
        return redirect()->route('admin.cars.index')
            ->with('success', 'Машина обновлена');
    }

    public function destroy($id)
    {
        $car = Car::findOrFail($id);
        $car->delete();
        
        return redirect()->route('admin.cars.index')
            ->with('success', 'Машина удалена');
    }
}