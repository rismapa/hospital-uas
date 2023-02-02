@extends('layouts.main')

@section('content')
    <div class="mb-5">
        <h1>Detail Dokter</h1>
    </div>
        
    <div class="row my-4">
        <div class="col-6">
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <th scope="col" class="bg-dark text-light">ID</th>
                        <td>{{ $doctor->id }}</td>
                    </tr>
                    <tr>
                        <th scope="col" class="bg-dark text-light">No Registrasi</th>
                        <td>{{ $doctor->registration_code }}</td>
                    </tr>
                    <tr>
                        <th scope="col" class="bg-dark text-light">Nama Dokter</th>
                        <td>{{ $doctor->name }}</td>
                    </tr>
                    <tr>
                        <th scope="col" class="bg-dark text-light">Nama Poli</th>
                        <td>{{ $doctor->polyclinic->name }}</td>
                    </tr>
                    <tr>
                        <th scope="col" class="bg-dark text-light">Dokter Bergabung Pada</th>
                        <td>{{ Carbon\Carbon::parse($doctor->timestamp)->isoFormat('dddd, D MMMM Y') }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-6">
            <table class="table table-striped">
            <thead class="bg-dark text-light text-center">
                <tr>
                <th scope="col" colspan="3">Daftar Pasien</th>
                </tr>
            </thead>
            <thead class="bg-dark text-light">
                <tr>
                <th scope="col">No</th>
                <th scope="col">No Registrasi</th>
                <th scope="col">Nama Pasien</th>
                </tr>
            </thead>
            <tbody>
        
                @foreach ($patients as $patient)
                <tr>
                    <th scope="row">{{ $loop->index + 1 }}</th>
                    <td>{{ $patient->registration_code }}</td>
                    <td>{{ $patient->name }}</td>
                </tr>
                @endforeach
        
            </tbody>
            </table>
        </div>
    </div>
@endsection