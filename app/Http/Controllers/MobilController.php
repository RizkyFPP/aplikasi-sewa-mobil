<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mobil;

class MobilController extends Controller
{
    public function index()
    {
        
        $mobils = Mobil::all();
        return view('mobils.index', compact('mobils'));
    }

    public function create()
    {
        
        return view('mobils.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'merek' => 'required',
            'model' => 'required',
            'no_plat' => 'required|unique:mobils',
            'tarif_sewa' => 'required|numeric',
        ]);

        Mobil::create($request->all());

        return redirect()->route('mobil.index')->with('success', 'Car created successfully!');
    }

    public function show(Mobil $mobil)
    {
        
        return view('mobils.show', compact('mobil'));
    }

    public function edit(Mobil $mobil)
    {
        
        return view('mobils.edit', compact('mobil'));
    }

    public function update(Request $request, Mobil $mobil)
    {
        $request->validate([
            'merek' => 'required',
            'model' => 'required',
            'no_plat' => 'required|unique:mobils,no_plat,' . $mobil->id,
            'tarif_sewa' => 'required|numeric',
        ]);

        $mobil->update($request->all());

        return redirect()->route('mobil.index')->with('success', 'Car updated successfully!');
    }

    public function destroy(Mobil $mobil)
    {
        $mobil->delete();

        return redirect()->route('mobil.index')->with('success', 'Car deleted successfully!');
    }
    
}
