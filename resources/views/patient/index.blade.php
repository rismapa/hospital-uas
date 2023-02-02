@extends('layouts.main')

@section('content')

  <h2 class="mb-4">Halaman Pasien</h2>
  <a href="patient/create" class="btn btn-primary">Tambah Pasien</a>

  @if (session()->get('success'))
    <div class="alert alert-success alert-dismissible fade show my-3" role="alert">
      {{ session()->get('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

  <table class="table table-striped my-4">
    <thead class="bg-dark text-light">
      <tr>
        <th scope="col" style="width: 5%">No</th>
        <th scope="col">No Registrasi</th>
        <th scope="col">Nama</th>
        <th scope="col">Umur</th>
        <th scope="col">Nama Dokter</th>
        <th scope="col">Nama Poli</th>
        <th scope="col" style="width: 5%">Aksi</th>
        <th scope="col" style="width: 5%"></th>
      </tr>
    </thead>
    <tbody>

      @foreach ($patients as $patient)
        <tr>
          <th scope="row">{{ $loop->index + 1 }}</th>
          <td>{{ $patient->registration_code }}</td>
          <td><a href="/patient/{{ $patient->id }}">{{ $patient->name }}</a></td>
          <td>{{ Carbon\Carbon::parse($patient->birthdate)->age }} Tahun</td>
          <td>{{ $patient->doctor->name }}</td>
          <td>{{ $patient->polyclinic->name }}</td>
          <td>  
            <a href="patient/{{ $patient->id }}/edit" class="btn btn-primary">Edit</a>
          </td>
          <td>
            <form action="patient/{{ $patient->id }}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger">Delete</button>
            </form>
          </td>
        </tr>
      @endforeach

    </tbody>
  </table>
@endsection