@extends('layouts.main')

@section('content')

  <h2 class="mb-4">Halaman Dokter</h2>
  <a href="doctor/create" class="btn btn-primary">Tambah Dokter</a>

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
        <th scope="col">Nama Poli</th>
        <th scope="col" style="width: 5%">Aksi</th>
        <th scope="col" style="width: 5%"></th>
      </tr>
    </thead>
    <tbody>

      @foreach ($doctors as $doctor)
        <tr>
          <th scope="row">{{ $loop->index + 1 }}</th>
          <td>{{ $doctor->registration_code }}</td>
          <td><a href="/doctor/{{ $doctor->id }}">{{ $doctor->name }}</a></td>
          <td>{{ $doctor->polyclinic->name }}</td>
          <td>  
            <a href="doctor/{{ $doctor->id }}/edit" class="btn btn-primary">Edit</a>
          </td>
          <td>
            <form action="doctor/{{ $doctor->id }}" method="POST">
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