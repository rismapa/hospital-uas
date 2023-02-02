<?php

namespace App\Http\Controllers;

use App\Doctor;
use App\Patient;
use App\Polyclinic;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::all();

        // dd($polyclinics);

        return view('doctor.index', compact('doctors'));
    }

    public function show($id)
    {
        $doctor = Doctor::find($id);

        $patients = Patient::where('doctor_id', $id)->get();

        return view('doctor.show', compact('doctor', 'patients'));
    }

    public function create()
    {
        $polis = Polyclinic::all();

        return view('doctor.create', compact('polis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:4',
            'polyclinic_id' => 'required'
        ]);

        // Membuat registration_code
        $registration_code = $this->getRegistrationCode($request['name']);;
        

        $doctor = new Doctor([
            'registration_code' => $registration_code,
            'name' => $request['name'],
            'polyclinic_id' => $request['polyclinic_id'],
        ]);

        
        $doctor->save();
        return redirect('/doctor')->with('success', 'Doctor Saved!');
    }

    public function destroy($id) 
    {
        $doctor = Doctor::find($id);

        $doctor->delete();
        
        return redirect('/doctor')->with('success', 'Doctor Deleted!');
    }

    public function edit($id) 
    {
        $doctor = Doctor::find($id);
        $polis = Polyclinic::all();

        return view('doctor.edit', compact('doctor', 'polis'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:4',
            'polyclinic_id' => 'required'
        ]);

        // dd($request);

        $doctor = Doctor::find($id);
        $doctor->name = $request['name'];
        $doctor->polyclinic_id = $request['polyclinic_id'];

        $doctor->save();
        
        return redirect('/doctor')->with('success', 'Doctor Updated!');
    }


    
    public function getRegistrationCode($name)
    {
        $kata = explode(' ', $name);
        $registration_code = '';

        foreach ($kata as $item) {
            $registration_code .= strtoupper(substr($item, 0, 1));
        }

        $registration_code .= date("Ymd");

        return $registration_code;
    }
}
