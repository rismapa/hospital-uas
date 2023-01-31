<?php

namespace App\Http\Controllers;

use App\Polyclinic;
use Illuminate\Http\Request;

class PolyclinicController extends Controller
{
    public function index()
    {
        $polyclinics = Polyclinic::all();

        // dd($polyclinics);

        return view('polyclinic.index', compact('polyclinics'));
    }

    public function create()
    {
        return view('polyclinic.create');
    }

    public function store(Request $request)
    {
        $polyclinic = new Polyclinic( $request->validate([
            'name' => 'required|min:4',
        ]));

        
        $polyclinic->save();
        return redirect('/polyclinic')->with('success', 'Polyclinic Saved!');
    }

    public function edit($id) 
    {
        $polyclinic = Polyclinic::find($id);

        return view('polyclinic.edit', compact('polyclinic'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:4',
        ]);

        $polyclinic = Polyclinic::find($id);
        $polyclinic->name = $request->name;

        $polyclinic->save();
        
        return redirect('/polyclinic')->with('success', 'Polyclinic Updated!');
    }

    public function destroy($id) 
    {
        $polyclinic = Polyclinic::find($id);
        
        // dd($faculty);

        $polyclinic->delete();
        
        return redirect('/polyclinic')->with('success', 'Polyclinic Deleted!');
    }
}
