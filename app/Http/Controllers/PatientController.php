<?php

namespace App\Http\Controllers;

use App\Doctor;
use App\Patient;
use App\Polyclinic;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index()
    {
        $patients = Patient::orderBy('registration_code', 'asc')->get();


        return view('patient.index', compact('patients'));
    }

    public function show($id)
    {
        $patient = Patient::find($id);

        return view('patient.show', compact('patient'));
    }

    public function create()
    {
        $polis = Polyclinic::all();

        return view('patient.create', compact('polis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:4',
            'birthdate' => 'required',
            'gender' => 'required',
            'polyclinic_id' => 'required',
            'doctor_id' => 'required',
        ]);

        $registration_code = $this->getRegistrationCodePatient($request->doctor_id);


        $patient = new Patient([
            'registration_code' => $registration_code,
            'name' => $request['name'],
            'birthdate' => $request['birthdate'],
            'gender' => $request['gender'],
            'polyclinic_id' => $request['polyclinic_id'],
            'doctor_id' => $request['doctor_id'],
        ]);

        
        $patient->save();
        return redirect('/patient')->with('success', 'Patient Saved!');
    }

    public function edit($id) 
    {
        $patient = Patient::find($id);
        $polis = Polyclinic::all();

        return view('patient.edit', compact('patient', 'polis'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required|min:4',
            'birthdate' => 'required',
            'gender' => 'required',
            'polyclinic_id' => 'required',
            'doctor_id' => 'required',
        ]);

        $registration_code = $this->getRegistrationCodePatient($request->doctor_id);

        $patient = Patient::find($id);
        $patient->name = $request['name'];
        $patient->birthdate = $request['birthdate'];
        $patient->gender = $request['gender'];
        
        if ($request['polyclinic_id'] != $patient->polyclinic_id || $request['doctor_id'] != $patient->doctor_id) {
            $patient->polyclinic_id = $request['polyclinic_id'];
            $patient->doctor_id = $request['doctor_id'];
            $patient->registration_code = $registration_code;
        }

        $patient->save();
        
        return redirect('/patient')->with('success', 'Patient Updated!');
    }

    public function destroy($id) 
    {
        $patient = Patient::find($id);

        $patient->delete();
        
        return redirect('/patient')->with('success', 'Patient Deleted!');
    }

    public function getRegistrationCodePatient($id){
        $doctor = Doctor::find($id);
        $doctorCode = preg_replace('/[^A-Z]/i', '', $doctor->registration_code);
        $doctorCode .=date('Ymd');
        $cekPasien = Patient::where('registration_code', 'LIKE', '%' . $doctorCode . '%')->first();
        
        $pasienCode = $doctorCode;

        if(!$cekPasien) {
            $pasienCode .= '001';
        } else {
            $noPasien = (int)substr($cekPasien->registration_code, -3);
            $noPasien += 1;

            if (strlen($noPasien < 2)) {
                $pasienCode .= sprintf("%04s", $noPasien);
            } elseif (strlen($noPasien < 3)) {
                $pasienCode .= sprintf("%03s", $noPasien);
            }
        }
        
        return $pasienCode;
    }


}
