@extends('layouts.main')

@section('content')
    <h1 class="mb-5">Detail Poliklinik</h1>
    
    <div class="col-12">
        <table class="table table-striped">
            <tbody>
                <tr>
                    <th scope="col" class="bg-dark text-light">ID</th>
                    <td>{{ $polyclinic->id }}</td>
                </tr>
                <tr>
                    <th scope="col" class="bg-dark text-light">Nama Poli</th>
                    <td>{{ $polyclinic->name }}</td>
                </tr>
                <tr>
                    <th scope="col" class="bg-dark text-light">Poli dibuat Pada</th>
                    <td>{{ Carbon\Carbon::parse($polyclinic->timestamp)->isoFormat('dddd, D MMMM Y') }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="row my-4">
      <div class="col-6">
        <table class="table table-striped">
          <thead class="bg-dark text-light text-center">
            <tr>
              <th scope="col" colspan="3">Daftar Dokter</th>
            </tr>
          </thead>
          <thead class="bg-dark text-light">
            <tr>
              <th scope="col">No</th>
              <th scope="col">No Registrasi</th>
              <th scope="col">Nama Dokter</th>
            </tr>
          </thead>
          <tbody>
      
            @foreach ($polyclinic->doctor as $doctor)
              <tr>
                <th scope="row">{{ $loop->index + 1 }}</th>
                <td>{{ $doctor->registration_code }}</td>
                <td>{{ $doctor->name }}</td>
              </tr>
            @endforeach
      
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
      
            @foreach ($polyclinic->patient as $patient)
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