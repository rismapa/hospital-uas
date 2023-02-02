@extends('layouts.main')

@section('content')

  
  <div class="form my-3 mx-auto text-center p-3">
    <h3 class="mb-5 fw-semibold">Tambah Data Poliklinik</h3>
    <form action="{{ route('polyclinic.store') }}" method="POST" class="text-start">
      @csrf
      <div class="mb-4">
        <label for="name" class="form-label"><small>Nama Poli</small></label>
        <input type="text" name="name" class="form-control @error('name') border-danger @enderror"" id="name" placeholder="Masukan Nama Poli" value="{{ old('name') }}">
        @error('name')
          <div class="text-danger">
            <small>{{ $message }}</small>
          </div>              
        @enderror
      </div>
      
      
      <div class="form-group mb-3">
        <input type="submit" value="Simpan" class="btn btn-success w-100">
      </div>
    </form>
  </div>
@endsection