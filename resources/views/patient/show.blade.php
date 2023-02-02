@extends('layouts.main')

@section('content')
    <div class="mb-5">
        <h1>Detail Pasien</h1>
    </div>

    <div class="col-6">
        <table class="table table-striped">
            <tbody>
                <tr>
                    <th scope="col" class="bg-dark text-light">No Registrasi</th>
                    <td>{{ $patient->registration_code }}</td>
                </tr>
                <tr>
                    <th scope="col" class="bg-dark text-light">Nama Pasien</th>
                    <td>{{ $patient->name }}</td>
                </tr>
                <tr>
                    <th scope="col" class="bg-dark text-light">Tanggal Lahir</th>
                    <td>{{ Carbon\Carbon::parse($patient->birthdate)->isoFormat('dddd, D MMMM Y') }}</td>
                </tr>
                <tr>
                    <th scope="col" class="bg-dark text-light">Umur</th>
                    <td>{{ Carbon\Carbon::parse($patient->birthdate)->age }} Tahun</td>
                </tr>
                <tr>
                    <th scope="col" class="bg-dark text-light">Jenis Kelamin</th>
                    <td>{{ $patient->gender == 'P' ? 'Pria' : 'Wanita' }}</td>
                </tr>
                <tr>
                    <th scope="col" class="bg-dark text-light">Nama Poli</th>
                    <td>{{ $patient->polyclinic->name }}</td>
                </tr>
                <tr>
                    <th scope="col" class="bg-dark text-light">Dokter Yang Menangani</th>
                    <td>{{ $patient->doctor->name }}</td>
                </tr>
        
            </tbody>
        </table>
    </div>
    
@endsection